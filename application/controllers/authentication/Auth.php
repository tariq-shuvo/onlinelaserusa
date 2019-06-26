<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
        $this->load->model('authUser');
        $this->load->model('middleware');
    }

    public function c_register()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){
            $config = array(
                array(
                    'field' => 'fname',
                    'label' => 'first name',
                    'rules' => 'required|trim'
                ),
                array(
                    'field' => 'lname',
                    'label' => 'last name',
                    'rules' => 'required|trim'
                ),
                array(
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'required|valid_email|trim|is_unique[customer.email]'
                ),
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'required|min_length[8]'
                ),
                array(
                    'field' => 'confirm_password',
                    'label' => 'confirm password',
                    'rules' => 'required|matches[password]'
                )
            );

            $this->form_validation->set_message('is_unique', 'The %s is already taken.');
            $this->form_validation->set_message('matches', 'The %s is not matched with password.');

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $error_messages=array(
                    'fname'=>form_error('fname'),
                    'lname'=>form_error('lname'),
                    'email'=>form_error('email'),
                    'password'=>form_error('password'),
                    'confirm_password'=>form_error('confirm_password')
                );

                $this->session->set_flashdata('register_validation', $error_messages);
                $this->session->set_flashdata('form_value', $_POST);
                redirect(base_url('user/registration'));
            }else{
                $first_name=$this->input->post('fname');
                $last_name=$this->input->post('lname');
                $email=$this->input->post('email');
                $password=$this->input->post('password');
                $confirm_password=$this->input->post('confirm_password');
                $verification_code=md5(uniqid(rand(),true));

                $registerData=array(
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'email'=>$email,
                    'password'=>md5($password.PASSWORD_ENCRYPTION),
                    'verification_code'=>$verification_code,
                    'create'=>Date("Y-m-d h:i:s")
                );

                $this->authUser->register($registerData);
                $this->session->set_flashdata('notification', '<div class="alert alert-success text-center">Please check your email a verification link has been sent to your email.</div>');
            }
        }else{
            $this->session->set_flashdata('notification', '<div class="alert alert-danger text-center">Your authentication token is missing.</div>');
        }
        redirect(base_url('user/registration'));
    }

    public function c_login()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){
            $config = array(
                array(
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'required|valid_email|trim'
                ),
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $error_messages=array(
                    'email'=>form_error('email'),
                    'password'=>form_error('password')
                );
                $this->session->set_flashdata('form_value', $_POST);
                $this->session->set_flashdata('login_validation', $error_messages);
                redirect(base_url('user/login'));
            }else{
                $email=$this->input->post('email');
                $password=md5($this->input->post('password').PASSWORD_ENCRYPTION);
                if(!$this->authUser->login($email, $password)){
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger text-center">Your email and password does not matched.</div>');
                    redirect(base_url('user/login'));
                }
            }
        }else{
            $this->session->set_flashdata('notification', '<div class="alert alert-danger text-center">Your authentication token is missing.</div>');
        }
        redirect(base_url());
    }

    public function c_forgot()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){
            $config = array(
                array(
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'required|trim|valid_email'
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $error_messages=array(
                    'email'=>form_error('email')
                );

                $this->session->set_flashdata('form_value', $_POST);
                $this->session->set_flashdata('forgot_validation', $error_messages);
                redirect(base_url('user/forgot'));
            }else{
                $email=$this->input->post('email');
                if($this->authUser->forgot($email)){
                    $this->session->set_flashdata('notification', '<div class="alert alert-success text-center">Please check your email a password reset link has been sent to your email.</div>');
                }else{
                    $this->session->set_flashdata('notification', '<div class="alert alert-danger text-center">You have entered wrong email.</div>');
                }
            }
        }else{
            $this->session->set_flashdata('notification', '<div class="alert alert-danger text-center">Your authentication token is missing.</div>');
        }
        redirect(base_url('user/forgot'));
    }

    public function c_verification($verify_id)
    {
        $verification_result=$this->authUser->email_verify($verify_id);
        if($verification_result==true){
            $this->session->set_flashdata('notification', '<div class="alert alert-success text-center">Your email verification completed successfully. Your can login in your account.</div>');
            redirect(base_url('user/login'));
        }else{
            redirect(base_url());
        }
    }

    public function c_reset()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){
            $config = array(
                array(
                    'field' => 'password',
                    'label' => 'password',
                    'rules' => 'required|min_length[8]'
                ),
                array(
                    'field' => 'confirm_password',
                    'label' => 'confirm Password',
                    'rules' => 'required|matches[password]'
                )
            );

            $this->form_validation->set_rules($config);

            if ($this->form_validation->run() == FALSE)
            {
                $error_messages=array(
                    'password'=>form_error('password'),
                    'confirm_password'=>form_error('confirm_password')
                );
                $this->session->set_flashdata('form_value', $_POST);
                $this->session->set_flashdata('reset_validation', $error_messages);
                redirect(base_url('user/reset/'.$this->input->post('reset_code')));
            }else{
                $password=$this->input->post('password');
                $confirm_password=$this->input->post('confirm_password');
                $reset_code=$this->input->post('reset_code');
                $this->authUser->reset(md5($password.PASSWORD_ENCRYPTION), $reset_code);
                $this->session->set_flashdata('notification', '<div class="alert alert-success text-center">Your new password has been set successfully. You can login with your new password.</div>');
            }
        }else{
            $this->session->set_flashdata('notification', '<div class="alert alert-danger text-center">Your authentication token is missing.</div>');
        }
        redirect(base_url('user/login'));
    }

    public function c_logout()
    {
        $this->middleware->remove_token(get_cookie('auth_token'));
        redirect(base_url());
    }

    public function a_register()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){

        }else{

        }
        redirect(base_url('super-admin/register'));
    }

    public function a_login()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){

        }else{

        }
        redirect(base_url('super-admin/login'));
    }

    public function a_forgot()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $this->authUser->login($email, $password);
        }else{

        }

        redirect(base_url('super-admin/forgot'));
    }

    public function a_reset()
    {
        $token=$this->input->post('token');
        if($this->authUser->check_token($token)==true){

        }else{

        }
        redirect(base_url('super-admin/reset'));
    }

}