<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $this->output->set_status_header('404');
        $this->load->view('page/errors', $data);
    }
}
?>