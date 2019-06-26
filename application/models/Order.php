<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 3/5/2019
 * Time: 2:07 PM
 */
class Order extends CI_Model
{
    public function sendemail($toEmailID, $fromEmailID, $emailSubject, $emailData, $templateName)
    {
        $this->load->library('email');
        $fromemail=$fromEmailID;
        $toemail = $toEmailID;
        $subject = $emailSubject;
        $data=$emailData;

        $msg = $this->load->view('website/templates/email/'.$templateName,$data,true);


        $config=array(
            'charset'=>'utf-8',
            'wordwrap'=> TRUE,
            'mailtype' => 'html'
        );

        $this->email->initialize($config);

        $this->email->to($toemail);
        $this->email->from($fromemail, "Onlinelaserusa.com");
        $this->email->subject($subject);
        $this->email->message($msg);
        $this->email->send();
    }

    public function placeorder($orderData)
    {
        $products=array();
        $totalAmount=0;
        foreach ($this->cart->contents() as $cart_product){
            $product=array(
                'id'=>(int)$cart_product['id'],
                'metal'=>$cart_product['name'],
                'thickness'=>$cart_product['options']['thicknessValue'],
                'width'=>$cart_product['options']['imageWidth'],
                'height'=>$cart_product['options']['imageHeight'],
                'unit'=>$cart_product['options']['unitType'],
                'quantity'=>$cart_product['qty'],
                'price'=>$cart_product['price'],
                'subtotal'=>$cart_product['subtotal'],
                'dxf_link'=>$cart_product['options']['dxfLink'],
                'svg_link'=>$cart_product['options']['svgLink'],
                'additional_info'=>$cart_product['options']['note'],
                'partNo'=>$cart_product['options']['partNo'],
                'create'=>Date("Y-m-d h:i:s"),
                'order_id'=>$orderData['id'],
            );
            array_push($products, $product);
            $totalAmount+=$cart_product['subtotal'];
        }

        $invoiceAddress=array(
            'first_name'=>$this->session->userdata('invoice_address')['first-name'],
            'last_name'=>$this->session->userdata('invoice_address')['last-name'],
            'email'=>$this->session->userdata('invoice_address')['email'],
            'street'=>$this->session->userdata('invoice_address')['address'],
            'city'=>$this->session->userdata('invoice_address')['city'],
            'zip'=>$this->session->userdata('invoice_address')['zip'],
            'state'=>$this->session->userdata('invoice_address')['state'],
            'country'=>$this->session->userdata('invoice_address')['country'],
            'contact'=>$this->session->userdata('invoice_address')['phone-number'],
            'company'=>$this->session->userdata('invoice_address')['company'],
            'create'=>Date("Y-m-d h:i:s"),
            'order_id'=>$orderData['id']
        );


//        $orderData['paid_Amount']=$totalAmount;
        $this->db->insert('order', $orderData);
        $this->db->insert_batch('products', $products);

        if($this->session->userdata('another_address')==1){
            $shippingAddress=array(
                'first_name'=>$this->session->userdata('shipping_address')['shipping_first-name'],
                'last_name'=>$this->session->userdata('shipping_address')['shipping_last-name'],
                'email'=>$this->session->userdata('shipping_address')['shipping_email'],
                'street'=>$this->session->userdata('shipping_address')['shipping_address'],
                'city'=>$this->session->userdata('shipping_address')['shipping_city'],
                'zip'=>$this->session->userdata('shipping_address')['shipping_zip'],
                'state'=>$this->session->userdata('shipping_address')['shipping_state'],
                'country'=>$this->session->userdata('shipping_address')['shipping_country'],
                'contact'=>$this->session->userdata('shipping_address')['shipping_phone-number'],
                'company'=>$this->session->userdata('shipping_address')['shipping_company'],
                'create'=>Date("Y-m-d h:i:s"),
                'order_id'=>$orderData['id']
            );
            $this->db->insert('invoice_address', $invoiceAddress);
            $this->db->insert('shipping_address', $shippingAddress);
        }else{
            $this->db->insert('invoice_address', $invoiceAddress);
            $this->db->insert('shipping_address', $invoiceAddress);
        }

    }

    public function order_temp_storage_remove()
    {
        $this->cart->destroy();
        $this->session->unset_userdata('shipping_address');
        $this->session->unset_userdata('invoice_address');
        $this->session->unset_userdata('another_address');
    }
}