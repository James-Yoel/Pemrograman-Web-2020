<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('dosen_model');
    }

    function index(){
        if($this->session->has_userdata('username')){
            $this->dosen();
        }
        else{
            redirect('Home');
        }
    }

    function dosen(){
        $nav['username'] = $this->session->userdata('username');
        $nav['uri'] = $this->uri->segment(1);
        $data['dosen'] = $this->dosen_model->getDosen();
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', $nav, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $this->load->view('page/dosen', $data);
    }

    function deleteDosen(){
        $id = $this->input->post('id');
        $this->dosen_model->deleteDosen($id);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}

?>