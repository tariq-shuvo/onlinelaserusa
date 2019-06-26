<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 3/11/2019
 * Time: 12:15 PM
 */
class AuthUser extends CI_Model
{
    public function csrf_token_generate()
    {
        $token=md5(uniqid(rand().PASSWORD_ENCRYPTION, true));
        $this->session->set_userdata('token',$token);
        return $token;
    }

    public function auth_token($customer_id)
    {
        $auth_token=md5(uniqid());
        $expire=date("Y/m/d H:i:s", strtotime("+40 minutes"));
        $data = array(
            'auth_token' => $auth_token,
            'token_expire_at'=>$expire,
            'update'=>Date("Y-m-d h:i:s")
        );
        $this->db->update('customer', $data, array('id' => $customer_id));
        $auth_cookie=array(
            'name'=>'auth_token',
            'value'=>$auth_token,
            'expire'=>time()+60*40,
            'path'=>'/'
        );
        set_cookie($auth_cookie);

        return true;
    }

    public function check_token($token)
    {
        if($token!="" && $this->session->userdata('token')!=""){
            if($token==$this->session->userdata('token')){
                $this->session->unset_userdata('token');
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function check_link_validation($column, $value, $table)
    {
        $this->db->where($column, $value);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    private function sendemail($toEmailID, $fromEmailID, $emailSubject, $emailData, $templateName)
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

    public function register($user_data)
    {
        $toEmailID=$user_data['email'];
        $fromEmailID=NO_REPLAY_EMAIL;
        $emailSubject="Verify your email";
        $emailData=array(
            'verification_link'=>base_url('customer/auth/verification/'.$user_data['verification_code'])
        );

        $templateName='verify';
        $this->db->insert('customer', $user_data);
        $this->sendemail($toEmailID, $fromEmailID, $emailSubject, $emailData, $templateName);
        return true;
    }


    public function subscription($user_data)
    {
        $this->db->insert('subscriptions', $user_data);
        return true;
    }

    public function login($email, $password)
    {
        $this->db->select("id");
        $this->db->from("customer");
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        $this->db->where("verify_email",1);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            $customer_id=$query->result_array()[0]['id'];
            return $this->auth_token($customer_id);
        }else{
            return false;
        }
    }

    public function forgot($key)
    {
        $this->db->where('email',$key);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0){
            $reset_code=md5(uniqid(rand().PASSWORD_ENCRYPTION, true));
            $data = array(
                'password_reset_code' => $reset_code,
                'update'=>Date("Y-m-d h:i:s")
            );
            $this->db->update('customer', $data, array('email' => $key));

            $toEmailID=$key;
            $fromEmailID=NO_REPLAY_EMAIL;
            $emailSubject="Reset Password Link";
            $emailData=array(
                'reset_link'=>base_url('user/reset/'.$reset_code)
            );
            $templateName='reset';
            $this->sendemail($toEmailID, $fromEmailID, $emailSubject, $emailData, $templateName);
            return true;
        }
        else{
            return false;
        }
    }

    public function reset($new_password, $reset_code)
    {
        $data = array(
            'password' => $new_password,
            'password_reset_code'=>null,
            'update'=>Date("Y-m-d h:i:s")
        );
        $this->db->update('customer', $data, array('password_reset_code' => $reset_code));
        return true;
    }

    public function email_verify($verification_code)
    {
        $this->db->where('verification_code', $verification_code);
        $this->db->where('verification_code!=', null);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0){
            $data = array(
                'verification_code' => null,
                'verify_email'=>1
            );
            $this->db->update('customer', $data, array('verification_code' => $verification_code));
            return true;
        }else{
            return false;
        }
    }

}