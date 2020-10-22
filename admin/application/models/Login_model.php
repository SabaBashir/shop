<?php


class Login_model extends CI_Model
{

    public function loginAuth($username,$password){
        $this->db->where(array('admin_name'=>$username,'admin_password'=>$password));
        $res = $this->db->get('admin');
        return $res->num_rows();
    }
}
