<?php


class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Product_model');
    }

    public function productDetails($product_id){
         $data['product_info'] = $this->Product_model->productDetails($product_id);
         $this->load->view('product/product_detail',$data);
    }

    public function searchProduct(){
        if($this->input->method()=='post'){
            $search_pro = $this->input->post('search_pro');
            $cat_id = $this->input->post('cat_id');
        }else{
            $cat_id = $this->input->get('cat_id');
            $search_pro = '';
        }
        $data['getAllCat'] = $this->Product_model->getAllCategory();
        $data['products'] = $this->Product_model->getSearchProResult($search_pro,$cat_id);
        $this->load->view('product/search_product',$data);
    }

    public function add_to_cart($pro_id){
        $product = $this->Product_model->get_rows($pro_id);

        $data = array(
            'id'=>$product['product_id'],
            'qty'=>1,
            'price'=>$product['product_price'],
            'name'=>$product['product_name'],
            'image'=>$product['product_image'],
        );

        $res = $this->cart->insert($data);
        if($res){

            redirect('cart');
        }else{
            redirect(base_url());
        }

    }

}
