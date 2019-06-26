<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

        $this->load->helper('download');

        $this->load->library('cart');
        $this->load->model('authUser');
        $this->load->model('middleware');
	}

	public function index()
	{
	    $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

	    $data=[
	      'scripts'=>[
	          base_url('assets/website/vendor/jquery/jquery.min.js'),
	          base_url('assets/website/vendor/popper.js/umd/popper.min.js'),
	          base_url('assets/website/vendor/bootstrap/js/bootstrap.min.js'),
	          base_url('assets/website/vendor/jquery.cookie/jquery.cookie.js'),
	          base_url('assets/website/vendor/nouislider/nouislider.min.js'),
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
	          base_url('assets/website/vendor/quotetool/css/quotetool.css'),
	          base_url('assets/website/css/custom-fonticons.css'),
	          base_url('assets/website/css/style.default.css'),
	          base_url('assets/website/css/custom.css')
          ],
          'title'=>'Home',
          'active'=>'home',
          'cart_product_num'=>count($this->cart->contents()),
          'all_cart_products'=>$this->cart->contents(),
          'customer_data'=>$auth_data,
          'token'=>$this->authUser->csrf_token_generate()
        ];
		$this->load->view('website/templates/header',$data);
		$this->load->view('website/pages/home');
		$this->load->view('website/templates/quotetool');
		$this->load->view('website/templates/footer');
	}

    public function capabilities()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

        $data=[
            'scripts'=>[
                base_url('assets/website/vendor/jquery/jquery.min.js'),
                base_url('assets/website/vendor/popper.js/umd/popper.min.js'),
                base_url('assets/website/vendor/bootstrap/js/bootstrap.min.js'),
                base_url('assets/website/vendor/jquery.cookie/jquery.cookie.js'),
                base_url('assets/website/vendor/nouislider/nouislider.min.js'),
                base_url('assets/website/vendor/lightbox/simple-lightbox.min.js'),
                'https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.2/require.min.js',
                base_url('assets/website/vendor/jquery-countdown/jquery.countdown.min.js'),
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
            'title'=>'Capabilities',
            'active'=>'capabilities',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/capabilities');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function guidelines()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Design guidelines',
            'active'=>'guidelines',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/guidelines');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function high_speed_laser_blanking()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Design guidelines',
            'active'=>'capabilities',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/high_speed_laser_blanking');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function videos()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Videos',
            'active'=>'videos',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/videos');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function contact()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Contact',
            'active'=>'contact',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/contact');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function cart()
    {
        if(count($this->cart->contents())<1){
            redirect(base_url());
        }

        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Cart',
            'active'=>'cart',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/view_cart');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function quote()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Quote tool',
            'active'=>'quote',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/quote');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }


    public function checkout()
    {
        if(count($this->cart->contents())<1){
            redirect(base_url());
        }
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));
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
            'title'=>'Checkout',
            'active'=>'cart',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/checkout');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function payment()
    {
        if(count($this->cart->contents())<1){
            redirect(base_url());
        }
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
                'https://cdn.jsdelivr.net/gh/square/connect-api-examples/templates/web-ui/payment-form/custom/sq-payment-form.css',
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
            'title'=>'Payment',
            'active'=>'cart',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'squareup'=>SQUAREUP,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/checkout_payment');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function review()
    {
        if(count($this->cart->contents())<1){
            redirect(base_url());
        }
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Review checkout',
            'active'=>'cart',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/order_review');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }

    public function confirmation()
    {
        if($this->session->flashdata('payment_done')=="done"){
            $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
                'title'=>'Checkout Confirmation',
                'active'=>'',
                'cart_product_num'=>count($this->cart->contents()),
                'all_cart_products'=>$this->cart->contents(),
                'customer_data'=>$auth_data,
                'token'=>$this->authUser->csrf_token_generate()
            ];
            $this->load->view('website/templates/header',$data);
            $this->load->view('website/pages/checkout_confirmation');
            $this->load->view('website/templates/quotetool');
            $this->load->view('website/templates/footer');
        }else{
            redirect(base_url());
        }

    }

    public function blog()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Blog',
            'active'=>'blog',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/blog');
        $this->load->view('website/templates/quotetool');
        $this->load->view('website/templates/footer');
    }


    public function not_found()
    {
        $auth_data=$this->middleware->customer_info(get_cookie('auth_token'));

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
            'title'=>'Not Found',
            'active'=>'',
            'cart_product_num'=>count($this->cart->contents()),
            'all_cart_products'=>$this->cart->contents(),
            'customer_data'=>$auth_data,
            'token'=>$this->authUser->csrf_token_generate()
        ];
        $this->load->view('website/templates/header',$data);
        $this->load->view('website/pages/404');
        $this->load->view('website/templates/footer');
    }

    public function download($fileName = NULL)
    {
        if ($fileName) {
            $file = "uploads/order/dxf/" . $fileName;
            // check file exists
            if (file_exists ( $file )) {
                // get file content
                $data = file_get_contents ( $file );
                //force download
                force_download ( $fileName, $data );
            } else {
                // Redirect to base url
                redirect ( base_url () );
            }
        }
    }

}
