<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

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
    }

    public function add()
    {
        if($this->input->post()){
            // Set array for send data.
            $insert_data = array(
                'id'      => $this->input->post('productID'),
                'qty'     => $this->input->post('totalQuantity'),
                'price'   => $this->input->post('unitPriceAmount'),
                'name'    => strtoupper($this->input->post('metalType')),
                'options' => array(
                    'thicknessValue' => strtoupper($this->input->post('thicknessValue')),
                    'imageWidth' => $this->input->post('imageWidth'),
                    'imageHeight' => $this->input->post('imageHeight'),
                    'unitType' => $this->input->post('unitType')==true?"mm":"inc",
                    'totalDimension' => $this->input->post('totalDimension'),
                    'shipping' => $this->input->post('unitShippingCost'),
                    'note' => $this->input->post('additionalNote'),
                    'partNo' => $this->input->post('partNumber'),
                    'svgLink' => base_url($this->input->post('svg_link')),
                    'dxfLink' => base_url($this->input->post('dxf_link'))
                )
            );

            // This function add items into cart.
            $this->cart->insert($insert_data);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(base_url());
        }

    }

    public function delete($rowid)
    {
        // Check rowid value.
        if ($rowid==="all"){
        // Destroy data which store in session.
            $this->cart->destroy();
        }else{
            // Destroy selected rowid in session.
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            // Update cart data, after cancel.
            $this->cart->update($data);
        }

        // This will show cancel data in cart.
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {
        if($this->input->post()){
            $data = array();
            // Recieve post values,calcute them and update
            foreach($_POST as $key=>$value){
                array_push($data, array(
                    'rowid'   => $key,
                    'qty'     => $value
                ));
            }

            $this->cart->update($data);
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            redirect(base_url());
        }
    }

    public function all()
    {
        if ($cart = $this->cart->contents()){
            foreach ($cart as $item){
                print_r($item);
            }
        }
    }
}