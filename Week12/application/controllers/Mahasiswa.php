<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('mahasiswa_model');
    }

    function index(){
        if($this->session->has_userdata('username')){
            $this->mahasiswa();
        }
        else{
            redirect('Home');
        }
    }

    function mahasiswa(){
        $nav['username'] = $this->session->userdata('username');
        $nav['uri'] = $this->uri->segment(1);
        $data['mahasiswa'] = $this->mahasiswa_model->getMahasiswa();
        $data['style'] = $this->load->view('include/style', $nav, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $this->load->view('page/mahasiswa', $data);
    }

    function deleteMahasiswa(){
        $id = $this->input->post('id');
        $this->mahasiswa_model->deleteMahasiswa($id);
        header('location:'.$_SERVER['HTTP_REFERER']);
    }
}
?>