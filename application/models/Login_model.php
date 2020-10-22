<?php


class Login_model extends CI_Model
{
    public function login($data){
        $this->db->where($data);
        $res = $this->db->get('users');
        return $res->num_rows();
    }
}
