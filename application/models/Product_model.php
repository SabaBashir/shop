<?php
class Product_model extends CI_Model {

    public function getFeatureProduct($product_type,$limit){
        $this->db->where('product_type',$product_type);
        $this->db->limit($limit);
        $res = $this->db->get('products');
        return $res->result();
    }

    public function productDetails($product_id){
        $this->db->where('product_id',$product_id);
        $res = $this->db->get('products');
        return $res->row();
    }

    public function getAllCategory(){
        $res = $this->db->get('category');
        return $res->result();
    }

    public function getSearchProResult($search_word,$cat_id){
        if($search_word){

            $this->db->like(array('product_name'=>$search_word));
        }
        if($cat_id){

            $this->db->where(array('cat_id'=>$cat_id));
        }
        $res = $this->db->get('products');
        return $res->result();
    }

    public function get_rows($id){
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_id',$id);
        $res = $this->db->get();
        return $res->row_array();
    }
}
