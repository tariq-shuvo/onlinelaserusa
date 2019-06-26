<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');

        //  load order model
        $this->load->model('order');

        require FCPATH . 'vendor/autoload.php';
    }

    public function checkout()
    {
# Replace these values. You probably want to start with your Sandbox credentials
# to start: https://docs.connect.squareup.com/articles/using-sandbox/

# The access token to use in all Connect API requests. Use your *sandbox* access
# token if you're just testing things out.
        $access_token = SQUAREUP['access'];
        $location_id =  SQUAREUP['location'];

// Initialize the authorization for Square
        \SquareConnect\Configuration::getDefaultConfiguration()->setAccessToken($access_token);

# Helps ensure this code has been reached via form submission
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            error_log("Received a non-POST request");
            echo "Request not allowed";
            http_response_code(405);
            return;
        }

# Fail if the card form didn't send a value for `nonce` to the server
        $nonce = $_POST['nonce'];
        if (is_null($nonce)) {
            echo "Invalid card data";
            http_response_code(422);
            return;
        }

        $transactions_api = new \SquareConnect\Api\TransactionsApi();

        $totalAmount=0;
        $shipping=0;
        foreach ($this->cart->contents() as $cart_product){
            $shipping=$shipping+($cart_product['options']['shipping']*$cart_product['qty']);
            $totalAmount+=$cart_product['subtotal'];
        }

# To learn more about splitting transactions with additional recipients,
# see the Transactions API documentation on our [developer site]
# (https://docs.connect.squareup.com/payments/transactions/overview#mpt-overview).
        $request_body = array (
            "card_nonce" => $nonce,
            # Monetary amounts are specified in the smallest unit of the applicable currency.
            # This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
            "amount_money" => array (
                "amount" => (int)(($totalAmount+$shipping)*100),
                "currency" => "USD"
            ),
            # Every payment you process with the SDK must have a unique idempotency key.
            # If you're unsure whether a particular payment succeeded, you can reattempt
            # it with the same idempotency key without worrying about double charging
            # the buyer.
            "idempotency_key" => uniqid()
        );

# The SDK throws an exception if a Connect endpoint responds with anything besides
# a 200-level HTTP code. This block catches any exceptions that occur from the request.
        try {

            $result = $transactions_api->charge($location_id, $request_body);

            $orderData=array(
                'id'=>$result->getTransaction()['id'],
                'payment_method'=>'card',
                'payment_status'=>1,
                'transaction_id'=>$result->getTransaction()['tenders'][0]['transaction_id'],
                'paid_Amount'=>$result->getTransaction()['tenders'][0]['amount_money']['amount'],
                'tokenID'=>$result->getTransaction()['location_id'],
                'payerID'=>$result->getTransaction()['tenders'][0]['id'],
                'create_date'=>Date("Y-m-d h:i:s")
            );

            $this->order->placeorder($orderData);

            $emailData=array(
                'shipping_address'=>$this->session->userdata('shipping_address'),
                'order_details'=>$orderData,
                'products'=>$this->cart->contents()
            );

            $this->order->sendemail($this->session->userdata('invoice_address')['email'], "no-replay@onlinelaserusa.com", "Order Invoice", $emailData, 'order');
            $this->order->sendemail(ADMIN_EMAIL, "no-replay@onlinelaserusa.com", "Order Invoice", $emailData, 'order');
            $this->order->order_temp_storage_remove();
            $this->session->set_flashdata('confirmation', $orderData);
            $this->session->set_flashdata('payment_done','done');
            redirect('checkout/confirmation');

        } catch (\SquareConnect\ApiException $e) {
            $this->session->set_flashdata('card_errors', $e->getResponseBody()->errors);
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}