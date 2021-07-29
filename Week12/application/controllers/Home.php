<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('home_model');
        //$this->session->sess_destroy();
    }

    function index(){
        if($this->session->has_userdata('username')){
            redirect('Dosen');
        }
        else{
            $error = NULL;
            $this->login($error);
        }
    }

    function login($error){
        if($error != NULL){
            $data['error'] = $error;
        }
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $this->load->view('page/login', $data);
    }

    function signOut(){
        $this->session->sess_destroy();
        redirect('Home');
    }

    function loginValidation(){
        if($this->input->post('email') != NULL && $this->input->post('password') != NULL){
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $password = md5($pass);
            $user = $this->home_model->loginUser($email, $password);
            if($user->num_rows() == 0){
                $error = "Data yang anda masukkan tidak valid !";
                $this->login($error);
            }
            else{
                $dataUser = $user->result_array();
                // echo $dataUser[0]['password'];
                $username = $dataUser[0]['fname_admin']." ".$dataUser[0]['lname_admin'];
                $this->session->set_userdata('username', $username);
                //echo $this->session->userdata('username');
                redirect('Dosen');
            }
        }
        else{
            $error = "Mohon untuk menginput data dengan lengkap !";
            $this->login($error);
        }
    }
}
?>
