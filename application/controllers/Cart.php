<?php


class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
    }

    public function index(){
        $this->load->view('cart/index');
    }

    public function update(){
        if($this->input->method()=='post'){

            $this->cart->update($this->input->post());
            redirect('cart');
        }
    }

    public function delete($row_id){
        $this->cart->remove($row_id);
        redirect('cart');
    }
}
