<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Placeorder extends CI_Controller {

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
        require FCPATH . 'vendor/autoload.php';

        //  load order model
        $this->load->model('order');
    }

    public function address()
    {
        $config = array(
            array(
                'field' => 'first-name',
                'label' => 'first name',
                'rules' => 'required'
            ),
            array(
                'field' => 'last-name',
                'label' => 'last name',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'required'
            ),
            array(
                'field' => 'address',
                'label' => 'state',
                'rules' => 'required'
            ),
            array(
                'field' => 'city',
                'label' => 'city',
                'rules' => 'required'
            ),
            array(
                'field' => 'zip',
                'label' => 'zip code',
                'rules' => 'required'
            ),
            array(
                'field' => 'state',
                'label' => 'state',
                'rules' => 'required'
            ),
            array(
                'field' => 'country',
                'label' => 'country',
                'rules' => 'required'
            ),
            array(
                'field' => 'phone-number',
                'label' => 'phone no.',
                'rules' => 'required'
            )
        );

        if($this->input->post('another-address')){
            array_push($config,array(
                'field' => 'shipping_first-name',
                'label' => 'first name',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_last-name',
                'label' => 'last name',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_email',
                'label' => 'email',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_address',
                'label' => 'state',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_city',
                'label' => 'city',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_zip',
                'label' => 'zip code',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_state',
                'label' => 'state',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_country',
                'label' => 'country',
                'rules' => 'required'
            ));
            array_push($config,array(
                'field' => 'shipping_phone-number',
                'label' => 'phone no.',
                'rules' => 'required'
            ));
        }


        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
            $error_messages=array(
                'first-name'=>form_error('first-name'),
                'last-name'=>form_error('last-name'),
                'email'=>form_error('email'),
                'address'=>form_error('address'),
                'city'=>form_error('city'),
                'zip'=>form_error('zip'),
                'state'=>form_error('state'),
                'country'=>form_error('country'),
                'phone-number'=>form_error('phone-number')
            );

            if($this->input->post('another-address')){
                $error_messages['shipping_first-name']=form_error('shipping_first-name');
                $error_messages['shipping_last-name']=form_error('shipping_last-name');
                $error_messages['shipping_email']=form_error('shipping_email');
                $error_messages['shipping_address']=form_error('shipping_address');
                $error_messages['shipping_city']=form_error('shipping_city');
                $error_messages['shipping_zip']=form_error('shipping_zip');
                $error_messages['shipping_state']=form_error('shipping_state');
                $error_messages['shipping_country']=form_error('shipping_country');
                $error_messages['shipping_phone-number']=form_error('shipping_phone-number');
            }

            $this->session->set_flashdata('address_errors', $error_messages);
            $this->session->set_flashdata('another-address', $this->input->post('another-address')?1:0);
            redirect(base_url('checkout'));
        }
        else
        {
            $address_invoice = array(
                'first-name'  => $this->input->post('first-name'),
                'last-name'     => $this->input->post('last-name'),
                'email'     => $this->input->post('email'),
                'address'     => $this->input->post('address'),
                'city'     => $this->input->post('city'),
                'zip'     => $this->input->post('zip'),
                'state'     => $this->input->post('state'),
                'country'     => $this->input->post('country'),
                'phone-number'     => $this->input->post('phone-number'),
                'company'     => $this->input->post('company')
            );

            if($this->input->post('another-address')){
                $shipping_address = array(
                    'shipping_first-name'  => $this->input->post('shipping_first-name'),
                    'shipping_last-name'     => $this->input->post('shipping_last-name'),
                    'shipping_email'     => $this->input->post('shipping_email'),
                    'shipping_address'     => $this->input->post('shipping_address'),
                    'shipping_city'     => $this->input->post('shipping_city'),
                    'shipping_zip'     => $this->input->post('shipping_zip'),
                    'shipping_state'     => $this->input->post('shipping_state'),
                    'shipping_country'     => $this->input->post('shipping_country'),
                    'shipping_phone-number'     => $this->input->post('shipping_phone-number'),
                    'shipping_company'     => $this->input->post('shipping_company')
                );
                $this->session->set_userdata('invoice_address', $address_invoice);
                $this->session->set_userdata('another_address', 1);
                $this->session->set_userdata('shipping_address', $shipping_address);
            }else{
                $this->session->set_userdata('invoice_address', $address_invoice);
                $this->session->set_userdata('another_address', 0);
                $this->session->set_userdata('shipping_address', $address_invoice);
            }

            redirect(base_url('checkout/review'));
        }

    }

    public function initialize_paypal()
    {
        $enableSandbox=false;

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                PAYPAL['clientID'],     // ClientID
                PAYPAL['clientSecret']  // ClientSecret
            )
        );

        $apiContext->setConfig([
            'mode' => $enableSandbox ? 'sandbox' : 'live'
        ]);

        return $apiContext;
    }

    public function payment()
    {
        $totalAmount=0;
        $shipping=0;
        foreach ($this->cart->contents() as $cart_product){
            $shipping=$shipping+($cart_product['options']['shipping']*$cart_product['qty']);
            $totalAmount+=$cart_product['subtotal'];
        }


        $apiContext=$this->initialize_paypal();

        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($totalAmount+$shipping);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(base_url('checkout/placeorder/update'))
            ->setCancelUrl(base_url('checkout/placeorder/cancel'));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        // After Step 3
        try {
            $payment->create($apiContext);
        } catch (Exception $e) {
            throw new Exception('Unable to create link for payment');
        }

        redirect($payment->getApprovalLink());

    }

    public function update()
    {
        $apiContext=$this->initialize_paypal();
        if (empty($_GET['paymentId']) || empty($_GET['PayerID'])) {
            throw new Exception('The response is missing the paymentId and PayerID');
        }

        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);

        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        try {
            // Take the payment
            $payment->execute($execution, $apiContext);

            try {

                $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);


                if ($payment->getState()=== 'approved') {
                    // Payment successfully added, redirect to the payment complete page.
                    $orderData=array(
                        'id'=>$payment->getId(),
                        'payment_method'=>'paypal',
                        'payment_status'=>1,
                        'transaction_id'=>$payment->getId(),
                        'paid_Amount'=>$payment->transactions[0]->amount->total,
                        'tokenID'=>$_GET['token'],
                        'payerID'=>$_GET['PayerID'],
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
                    exit(1);
                } else {
                    // Payment failed
                    redirect('checkout/failed');
                    exit(1);
                }

            } catch (Exception $e) {
                // Failed to retrieve payment from PayPal
                print_r($e);
            }

        } catch (Exception $e) {
            // Failed to take payment
            print_r($e);
        }

    }

    public function cancel()
    {
        $this->session->set_flashdata('subscription_notification', '<div class="alert alert-danger text-center"><strong>Woops!</strong> Your payment process has been canceled. Please try again.</div>');
        redirect(base_url());
    }

    public function failed()
    {
        $this->session->set_flashdata('subscription_notification', '<div class="alert alert-danger text-center"><strong>Woops!</strong> Your payment process has been failed. Please check your account balanced, status and etc.</div>');
        redirect(base_url());
    }
}