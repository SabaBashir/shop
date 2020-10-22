<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(array('Register_model','Product_model'));
        $this->load->library('form_validation');
    }

    public function index(){
        $data['getAllCat'] = $this->Product_model->getAllCategory();
        $this->load->view('register',$data);
    }
    public function signUp(){
        $username = $this->input->post('user_name');
        $firstname = $this->input->post('first_name');
        $lastname = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $mobile_no = $this->input->post('mobile_no');

        $this->form_validation->set_rules('user_name','User Name','required|is_unique[users.user_name]|min_length[4]');
        $this->form_validation->set_rules('first_name','First Name','required');
        $this->form_validation->set_rules('last_name','Last Name','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|min_length[5]');
        $this->form_validation->set_rules('mobile_no','Mobile Number','required|exact_length[11]');

        if($this->form_validation->run()==FALSE){
            $this->load->view('register');
        }else{
            $data = array(
                'user_name'=>$username,
                'first_name' =>$firstname,
                'last_name' =>$lastname,
                'email' =>$email,
                'password' =>$password,
                'mobile_no' =>$mobile_no,
                'ip' =>$this->input->ip_address(),
            );
            $last_id = $this->Register_model->signUpData($data);
            if($last_id){
                $this->session->set_flashdata('success','You have successfully register. Please login!!');
                redirect('register');
            }

        }
    }

}
