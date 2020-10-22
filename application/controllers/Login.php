<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->form_validation->set_rules('username','User Name','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run()==FALSE){
            echo json_encode(array("blank"));
        }else{
            $data = array(
                'user_name' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
            $loginRes = $this->Login_model->login($data);
            if($loginRes>0){
                echo json_encode(array("success"));
                $this->session->set_userdata('user_name',$this->input->post('username'));
            }else{
                echo json_encode(array("failed"));
            }

            $this->Login_model->login($data);
        }
    }
    public function logout(){
        $this->session->sess_destroy();

            redirect(base_url());
    }
}
