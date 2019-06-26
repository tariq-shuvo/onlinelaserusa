<?php

/**
 * Created by PhpStorm.
 * User: Shuvo
 * Date: 3/9/2019
 * Time: 11:34 AM
 */
class Middleware extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }



    public function customer_info($auth_token)
    {
        $this->db->select("id, first_name, last_name, email");
        $this->db->from("customer");
        $this->db->where("auth_token",$auth_token);
        $this->db->where("auth_token!=",null);
        $this->db->where("token_expire_at>=", date("Y/m/d H:i:s"));
        $query = $this->db->get();


        if($query->num_rows()>0){
            $this->update_cookie($auth_token);
        }else{
            $this->remove_token($auth_token);
        }

        return $query->result_array();
    }

    public function remove_token($auth_token)
    {
        if($auth_token!=null){
            $data = array(
                'auth_token' => null,
                'token_expire_at'=>null,
                'update'=>Date("Y-m-d h:i:s")
            );
            $this->db->update('customer', $data, array('auth_token' => $auth_token));
        }

        $auth_cookie=array(
            'name'=>'auth_token',
            'path'=>'/'
        );
        delete_cookie($auth_cookie);
    }
    

    public function update_cookie($old_auth_token)
    {
        $auth_token=md5(uniqid());
        $expire=date("Y/m/d H:i:s", strtotime("+40 minutes"));
        $data = array(
            'auth_token' => $auth_token,
            'token_expire_at'=>$expire,
            'update'=>Date("Y-m-d h:i:s")
        );
        $this->db->update('customer', $data, array('auth_token' => $old_auth_token));
        $auth_cookie=array(
            'name'=>'auth_token',
            'value'=>$auth_token,
            'expire'=>time()+60*40,
            'path'=>'/'
        );
        set_cookie($auth_cookie);

        return $auth_token;
    }


}