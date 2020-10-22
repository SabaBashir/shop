<?php


class Category_model extends CI_Model
{
    public function add_category($data){

        $res = $this->db->insert('category',$data);
        return $res;
    }

}
