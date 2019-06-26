<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 3/11/2019
 * Time: 12:33 PM
 */
class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('authUser');
        $this->load->model('middleware');
        $this->load->model('simpleTask');
    }

    public function checkAuth()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));
        if(count($auth_data)>0){
            redirect(base_url());
        }
    }

    public function login()
    {
        $this->checkAuth();

        $data=[
            'scripts'=>[
                base_url('assets/website/vendor/jquery/jquery.min.js'),
                base_url('assets/website/vendor/popper.js/umd/popper.min.js'),
                base_url('assets/website/vendor/bootstrap/js/bootstrap.min.js'),
                base_url('assets/website/vendor/jquery.cookie/jquery.cookie.js'),
                base_url('assets/website/vendor/nouislider/nouislider.min.js'),
                base_url('assets/website/vendor/lightbox/simple-lightbox.min.js'),
                base_url('assets/website/vendor/jquery-countdown/jquery.countdown.min.js'),
                'https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js',
                base_url('assets/website/vendor/quotetool/js/quote_calculation.js'),
                base_url('assets/website/vendor/quotetool/js/quote_ranges.js'),
                base_url('assets/website/vendor/quotetool/js/script.js'),
                base_url('assets/website/js/front.js')
            ],
            'styles'=>[
                base_url('assets/website/vendor/bootstrap/css/bootstrap.min.css'),
                base_url('assets/website/vendor/font-awesome/css/font-awesome.min.css'),
                base_url('assets/website/vendor/bootstrap-select/css/bootstrap-select.min.css'),
                base_url('assets/website/vendor/nouislider/nouislider.css'),
                base_url('assets/website/vendor/lightbox/simplelightbox.min.css'),
                base_url('assets/website/vendor/quotetool/css/quotetool.css'),
                base_url('assets/website/css/custom-fonticons.css'),
                base_url('assets/website/css/style.default.css'),
                base_url('assets/website/css/custom.css')
            ],
            'title'=>'Login',
            'active'=>'user',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'token'=>$this->authUser->csrf_token_generate(),
            'customer_data'=>array()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/login');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function register()
    {
        $this->checkAuth();

        $data=[
            'scripts'=>[
                base_url('assets/website/vendor/jquery/jquery.min.js'),
                base_url('assets/website/vendor/popper.js/umd/popper.min.js'),
                base_url('assets/website/vendor/bootstrap/js/bootstrap.min.js'),
                base_url('assets/website/vendor/jquery.cookie/jquery.cookie.js'),
                base_url('assets/website/vendor/nouislider/nouislider.min.js'),
                base_url('assets/website/vendor/lightbox/simple-lightbox.min.js'),
                base_url('assets/website/vendor/jquery-countdown/jquery.countdown.min.js'),
                'https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js',
                base_url('assets/website/vendor/quotetool/js/quote_calculation.js'),
                base_url('assets/website/vendor/quotetool/js/quote_ranges.js'),
                base_url('assets/website/vendor/quotetool/js/script.js'),
                base_url('assets/website/js/front.js')
            ],
            'styles'=>[
                base_url('assets/website/vendor/bootstrap/css/bootstrap.min.css'),
                base_url('assets/website/vendor/font-awesome/css/font-awesome.min.css'),
                base_url('assets/website/vendor/bootstrap-select/css/bootstrap-select.min.css'),
                base_url('assets/website/vendor/nouislider/nouislider.css'),
                base_url('assets/website/vendor/lightbox/simplelightbox.min.css'),
                base_url('assets/website/vendor/quotetool/css/quotetool.css'),
                base_url('assets/website/css/custom-fonticons.css'),
                base_url('assets/website/css/style.default.css'),
                base_url('assets/website/css/custom.css')
            ],
            'title'=>'Register',
            'active'=>'user',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'token'=>$this->authUser->csrf_token_generate(),
            'customer_data'=>array()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/signup');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function forgot()
    {
        $this->checkAuth();
        $data=[
            'scripts'=>[
                base_url('assets/website/vendor/jquery/jquery.min.js'),
                base_url('assets/website/vendor/popper.js/umd/popper.min.js'),
                base_url('assets/website/vendor/bootstrap/js/bootstrap.min.js'),
                base_url('assets/website/vendor/jquery.cookie/jquery.cookie.js'),
                base_url('assets/website/vendor/nouislider/nouislider.min.js'),
                base_url('assets/website/vendor/lightbox/simple-lightbox.min.js'),
                base_url('assets/website/vendor/jquery-countdown/jquery.countdown.min.js'),
                'https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js',
                base_url('assets/website/vendor/quotetool/js/quote_calculation.js'),
                base_url('assets/website/vendor/quotetool/js/quote_ranges.js'),
                base_url('assets/website/vendor/quotetool/js/script.js'),
                base_url('assets/website/js/front.js')
            ],
            'styles'=>[
                base_url('assets/website/vendor/bootstrap/css/bootstrap.min.css'),
                base_url('assets/website/vendor/font-awesome/css/font-awesome.min.css'),
                base_url('assets/website/vendor/bootstrap-select/css/bootstrap-select.min.css'),
                base_url('assets/website/vendor/nouislider/nouislider.css'),
                base_url('assets/website/vendor/lightbox/simplelightbox.min.css'),
                base_url('assets/website/vendor/quotetool/css/quotetool.css'),
                base_url('assets/website/css/custom-fonticons.css'),
                base_url('assets/website/css/style.default.css'),
                base_url('assets/website/css/custom.css')
            ],
            'title'=>'Forgot Password',
            'active'=>'user',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'token'=>$this->authUser->csrf_token_generate(),
            'customer_data'=>array()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/forgot');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function reset($id)
    {
        $this->checkAuth();
        $this->load->model('authUser');
        $link_validation_result=$this->authUser->check_link_validation('password_reset_code',$id,'customer');
        if($link_validation_result==false){
            redirect(base_url());
        }
        $data=[
            'scripts'=>[
                base_url('assets/website/vendor/jquery/jquery.min.js'),
                base_url('assets/website/vendor/popper.js/umd/popper.min.js'),
                base_url('assets/website/vendor/bootstrap/js/bootstrap.min.js'),
                base_url('assets/website/vendor/jquery.cookie/jquery.cookie.js'),
                base_url('assets/website/vendor/nouislider/nouislider.min.js'),
                base_url('assets/website/vendor/lightbox/simple-lightbox.min.js'),
                base_url('assets/website/vendor/jquery-countdown/jquery.countdown.min.js'),
                'https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js',
                base_url('assets/website/vendor/quotetool/js/quote_calculation.js'),
                base_url('assets/website/vendor/quotetool/js/quote_ranges.js'),
                base_url('assets/website/vendor/quotetool/js/script.js'),
                base_url('assets/website/js/front.js')
            ],
            'styles'=>[
                base_url('assets/website/vendor/bootstrap/css/bootstrap.min.css'),
                base_url('assets/website/vendor/font-awesome/css/font-awesome.min.css'),
                base_url('assets/website/vendor/bootstrap-select/css/bootstrap-select.min.css'),
                base_url('assets/website/vendor/nouislider/nouislider.css'),
                base_url('assets/website/vendor/lightbox/simplelightbox.min.css'),
                base_url('assets/website/vendor/quotetool/css/quotetool.css'),
                base_url('assets/website/css/custom-fonticons.css'),
                base_url('assets/website/css/style.default.css'),
                base_url('assets/website/css/custom.css')
            ],
            'title'=>'Reset Password',
            'active'=>'user',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'reset_code'=>$id,
            'token'=>$this->authUser->csrf_token_generate(),
            'customer_data'=>array()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/reset');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function subscription()
    {
        if($this->input->post()){
            $token=$this->input->post('token');
            if($this->authUser->check_token($token)==true){
                $email=$this->input->post('subscribermail');
                $user_data=array(
                    'email'=>$email,
                    'create'=>Date("Y-m-d h:i:s")
                );
                $this->authUser->subscription($user_data);
                $this->session->set_flashdata('subscription_notification', '<div class="alert alert-success text-center">You have successfully subscribed into your site. We will inform you our every update. Thanks for stay with us.</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function contact()
    {
        if($this->input->post()){
            $token=$this->input->post('token');
            if($this->authUser->check_token($token)==true){
                $name=$this->input->post('name');
                $surname=$this->input->post('surname');
                $email=$this->input->post('email');
                $message=$this->input->post('message');
                $this->simpleTask->contact_email($name, $surname, $email, $message);
                $this->session->set_flashdata('notification', '<div class="alert alert-success text-center">You contact message has been sent. We will reach you shortly.</div>');
                redirect(base_url('contact'));
            }else{
                redirect(base_url('contact'));
            }
        }else{
            redirect(base_url('contact'));
        }
    }

    public function custom_quote()
    {
        if($this->input->post()){
            $token=$this->input->post('token');

            $target_dir = "uploads/request/";
            $unique_file_name=uniqid().uniqid();
            $imageFileType = strtolower(pathinfo(basename($_FILES["uploadFieldCustomQuote"]["name"]),PATHINFO_EXTENSION));
            $target_file = $target_dir . $unique_file_name.".".$imageFileType;

            move_uploaded_file($_FILES["uploadFieldCustomQuote"]["tmp_name"], $target_file);

            if($this->authUser->check_token($token)==true){
                $metalTypeCustomQuote=$this->input->post('metalTypeCustomQuote');
                $overallAreaCustomQuote=$this->input->post('overallAreaCustomQuote');
                $firstNameCustomQuote=$this->input->post('firstNameCustomQuote');
                $totalQuantityCustomQuote=$this->input->post('totalQuantityCustomQuote');
                $thicknessCustomQuote=$this->input->post('thicknessCustomQuote');
                $lastNameCustomQuote=$this->input->post('lastNameCustomQuote');
                $emailCustomQuoteRequest=$this->input->post('emailCustomQuoteRequest');
                $additional_comments=$this->input->post('additional_comments');
                $uploaded_file=$target_file;

                $this->simpleTask->mail_custom_quote($metalTypeCustomQuote, $firstNameCustomQuote, $lastNameCustomQuote, $emailCustomQuoteRequest, $additional_comments, $overallAreaCustomQuote, $totalQuantityCustomQuote, $thicknessCustomQuote, $uploaded_file);
                $this->session->set_flashdata('subscription_notification', '<div class="alert alert-success text-center">Your custom quote request has been received. We will reach you shortly. Thanks for stay with us.</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

}