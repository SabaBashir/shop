<?php


class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('category/add_category');
    }

    public function add_category(){
        if($this->input->method()=='post'){
            $this->form_validation->set_rules('category_name','Category Name','required');
            $this->form_validation->set_rules('category_desc','Category Desc','required');
            if($this->form_validation->run()==TRUE){
                $data = array(
                    'cat_name' => $this->input->post('category_name'),
                    'cat_desc' =>  $this->input->post('category_desc'),
                );

                $res = $this->Category_model->add_category($data);
                if($res>0){
                    redirect('category');
                }
            }
        }
    }
}
