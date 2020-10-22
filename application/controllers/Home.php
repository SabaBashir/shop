<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
    }

    public function index(){
        $data['featuredProductsFirst'] = $this->Product_model->getFeatureProduct(1,4);
        $data['featuredProductsSecond'] = $this->Product_model->getFeatureProduct(2,4);
        $data['latestProducts'] = $this->Product_model->getFeatureProduct(3,6);
        $data['getAllCat'] = $this->Product_model->getAllCategory();
       $this->load->view('home',$data);
    }
}

?>
