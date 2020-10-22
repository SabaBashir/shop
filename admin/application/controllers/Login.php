<?php

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('user_name')){
            redirect('dashboard');
        }
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }

    public function index(){
        if($this->input->method()=='post'){
            $this->form_validation->set_rules('user_name','User Name','required');
            $this->form_validation->set_rules('password','Password','required');
            if($this->form_validation->run()==FALSE){
                $this->load->view('login');
            }else{
                $user_name = $this->input->post('user_name');
                $password = md5($this->input->post('password'));
                $res = $this->Login_model->loginAuth($user_name,$password);
                if($res>0){
                    $this->session->set_userdata('user_name',$user_name);
                    redirect('dashboard');
                }else{
                    $this->load->view('login');

                }
            }
        }else{

            $this->load->view('login');
        }
    }


}
