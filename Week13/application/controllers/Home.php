<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('home_model');
    }

    function index(){
        redirect('Home/book');
    }

    function Book(){
        if(!empty($this->session->flashdata('error'))){
            $data['error'] = $this->session->flashdata('error');
        }
        if($this->session->has_userdata('user')){
            $data['user'] = TRUE;
        }
        else{
            $data['user'] = FALSE;
        }
        $data['book'] = $this->home_model->ShowData();
        $data['style'] = $this->load->view('include/style', NULL, TRUE);
        $data['script'] = $this->load->view('include/script', NULL, TRUE);
        $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
        $data['footer'] = $this->load->view('template/footer',NULL,TRUE);
        $this->load->view('page/book', $data);
    }

    function Login(){
        $this->form_validation->set_error_delimiters('<p class="text-danger text-center">', '</p>');
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Tolong input sesuatu !'));
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/Book');
        }
        else{
            $pass = $this->input->post('password');
            $password = md5($pass);
            $user = $this->home_model->checkPassword($password);
            if($user->num_rows() == 0){
                $this->session->set_flashdata('error', 'Password tidak sesuai !');
            }
            else{
                $data = $user->result_array();
                $dataUser = $data[0]['Password'];
                $this->session->set_userdata('user', $dataUser);
            }
            redirect('Home/Book');
        }
    }

    function Logout(){
        $this->session->sess_destroy();
        redirect('Home');
    }

    function AddTheBook(){
        if($this->session->has_userdata('user')){
            if(!empty($this->session->flashdata('error'))){
                $data['error'] = $this->session->flashdata('error');
            }
            $data['style'] = $this->load->view('include/style', NULL, TRUE);
            $data['script'] = $this->load->view('include/script', NULL, TRUE);
            $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
            $data['footer'] = $this->load->view('template/footer',NULL,TRUE);
            $this->load->view('page/addbook', $data);
        }
        else{
            redirect('Home');
        }
    }

    function AddBook(){
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_rules('title', 'Title', 'required', array('required' => '*You must provide a string to Title !'));
		$this->form_validation->set_rules('year', 'Year', 'required|numeric|min_length[4]|max_length[5]', array('required' => '*You must provide a number to Year !', 'numeric' => 'You should input a number not a string to Year !', 'min_length' => 'Please input minimal 4 number to Title !', 'max_length' => 'Input maximal 5 number to Year !'));
        $this->form_validation->set_rules('publisher', 'Publisher', 'required|max_length[50]', array('required' => '*You must provide a string !', 'max_length' => 'The Publisher field cannot exceed 50 characters in length to Publisher!'));
        $this->form_validation->set_rules('author', 'Author', 'required|max_length[30]', array('required' => '*You must provide a string !', 'max_length' => 'The Author field cannot exceed 30 characters in length to Author !'));
        $this->form_validation->set_rules('poster', '', 'callback_poster_check');
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/bookadd');
        }
        else{
            $title = $this->input->post('title');
            $year = $this->input->post('year');
            $publisher = $this->input->post('publisher');
            $author = $this->input->post('author');
            $config['upload_path'] = 'assets/poster/';
			$config['allowed_types'] = 'jpg|png|jfif';
			$config['max_size'] = 1048576;
			$this->load->library('upload', $config);
			$this->upload->do_upload('poster');
			$posterInfo = $this->upload->data();
            $posterName = $posterInfo['file_name'];
            $this->home_model->AddData($title, $year, $publisher, $author, $posterName);
			redirect('Home/book');
        }
        
    }

    function poster_check($str){
		$allowedType = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png');
		$mime = get_mime_by_extension($_FILES['poster']['name']);
		if(isset($_FILES['poster']['name']) && $_FILES['poster']['name']!=""){
            if(in_array($mime, $allowedType)){
                if($_FILES['poster']['size'] < 1048576){
					return true;
				}
				else{
					$this->form_validation->set_message('poster_check', 'The uploaded file exceeds the maximum allowed size in your PHP configuration file for Poster !');
                	return false;
				}
			}
			else{
                $this->form_validation->set_message('poster_check', 'The filetype you are attempting to upload is not allowed for Poster !');
                return false;
            }
		}
		else{
            $this->form_validation->set_message('poster_check', 'Please choose a file to upload for Poster !');
            return false;
        }
    }
    
    function ViewTheBook(){
        if($this->session->has_userdata('user')){
            if(!empty($this->session->flashdata('error'))){
                $data['error'] = $this->session->flashdata('error');
            }
            $id = $this->input->get('id', TRUE);
            $data['detail'] = $this->home_model->ViewData($id);
            $data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
            $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
            $data['footer'] = $this->load->view('template/footer',NULL,TRUE);
            $this->load->view('page/viewbook', $data);
        }
        else{
            redirect('Home');
        }
    }

    function EditTheBook(){
        if($this->session->has_userdata('user')){
            $id = $this->input->get('id', TRUE);
            $data['detail'] = $this->home_model->ViewData($id);
            $data['style'] = $this->load->view('include/style',NULL,TRUE);
            $data['script'] = $this->load->view('include/script',NULL,TRUE);
            $data['navbar'] = $this->load->view('template/navbar',NULL,TRUE);
            $data['footer'] = $this->load->view('template/footer',NULL,TRUE);
            $this->load->view('page/editbook', $data);
        }
        else{
            redirect('Home');
        }
    }

    function EditBook(){
        $id = $this->input->post('bookID');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_rules('title', 'Title', 'required', array('required' => '*You must provide a string to Title !'));
		$this->form_validation->set_rules('year', 'Year', 'required|numeric|min_length[4]|max_length[5]', array('required' => '*You must provide a number to Year !', 'numeric' => 'You should input a number not a string to Year !', 'min_length' => 'Please input minimal 4 number to Title !', 'max_length' => 'Input maximal 5 number to Year !'));
        $this->form_validation->set_rules('publisher', 'Publisher', 'required|max_length[50]', array('required' => '*You must provide a string !', 'max_length' => 'The Publisher field cannot exceed 50 characters in length to Publisher!'));
        $this->form_validation->set_rules('author', 'Author', 'required|max_length[30]', array('required' => '*You must provide a string !', 'max_length' => 'The Author field cannot exceed 30 characters in length to Author !'));
        if($_FILES['poster']['size'] != 0){
			$this->form_validation->set_rules('poster', '', 'callback_poster_check');
		}
        if($this->form_validation->run() == false){
            $this->session->set_flashdata('error', validation_errors());
            redirect("Home/bookedit?id=".$id."");
        }
        else{
            $title = $this->input->post('title');
            $year = $this->input->post('year');
            $publisher = $this->input->post('publisher');
            $author = $this->input->post('author');
            if($_FILES['poster']['size'] == 0){
                $posterName = $this->input->post('posterLama');
            }
            else{
                $config['upload_path'] = 'assets/poster/';
                $config['allowed_types'] = 'jpg|png|jfif';
                $config['max_size'] = 1048576;
                $this->load->library('upload', $config);
                $this->upload->do_upload('poster');
                $posterInfo = $this->upload->data();
                $posterName = $posterInfo['file_name'];
            }
            $this->home_model->EditData($id, $title, $year, $publisher, $author, $posterName);
			redirect('Home/book');
        }
    }

    function DeleteTheBook(){
        if($this->session->has_userdata('user')){
            $id = $this->input->get('id', TRUE);
            $this->home_model->DeleteData($id);
            redirect('Home/book');
        }
        else{
            redirect('Home');
        }
    }

}

?>