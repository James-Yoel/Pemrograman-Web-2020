<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MoviePage extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('movies');
		//Biar gk ngirim data setiap load page
		// $this->load->view('include/style');
		// $this->load->view('include/script');
		// $this->load->view('template/navbar_movie');
		// $this->load->view('template/footer_movie');
	}

	public function index()
	{
	
		$movies['data'] = $this->movies->ShowData();

		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);

		$data['table'] = $this->load->view('template/table_movie', $movies, TRUE);

		$this->load->view('page/movie',$data);
	}

	public function ShowDetail()
	{
		$id = $this->input->get('id', TRUE);
		$data['detail'] = $this->movies->showDetail($id);
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		$this->load->view('page/movie_details', $data);
	}

	public function ShowAdd()
	{
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		// $this->load->helper('form');
		$this->load->view('page/movie_add', $data);
	}

	public function AddMovie()
	{
		$this->load->library('form_validation');
		$this->load->helper('file');
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>'); 
		$this->form_validation->set_rules('title', 'Title', 'required', array('required' => '*You must provide a string !'));
		$this->form_validation->set_rules('year', 'Year', 'required|numeric|min_length[4]|max_length[5]', array('required' => '*You must provide a number !', 'numeric' => 'You should input a number not a string !', 'min_length' => 'Please input minimal 4 number !', 'max_length' => 'Input maximal 5 number !'));
		$this->form_validation->set_rules('director', 'Director', 'required|max_length[30]', array('required' => '*You must provide a string or number !', 'max_length' => 'The Director field cannot exceed 30 characters in length !'));
		$this->form_validation->set_rules('poster', '', 'callback_poster_check');

		if($this->form_validation->run() == false){
			$data['style'] = $this->load->view('include/style',NULL,TRUE);
			$data['script'] = $this->load->view('include/script',NULL,TRUE);
			$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
			$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
			$this->load->view('page/movie_add', $data);
		}
		else{
			$title = $this->input->post('title');
			$year = $this->input->post('year');
			$director = $this->input->post('director');
			$config['upload_path'] = 'assets/poster/';
			$config['allowed_types'] = 'jpg|png|jfif';
			$config['max_size'] = 1048576;
			$this->load->library('upload', $config);
			$this->upload->do_upload('poster');
			$posterInfo = $this->upload->data();
			$posterName = $posterInfo['file_name'];
			$posterLink = $config['upload_path'].$posterName;
			$this->movies->AddData($title, $year, $director, $posterLink);
			redirect('MoviePage');
		}
	}

	public function ShowEdit($param)
	{
		$data['detail'] = $this->movies->showDetail($param);
		$data['style'] = $this->load->view('include/style',NULL,TRUE);
		$data['script'] = $this->load->view('include/script',NULL,TRUE);
		$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
		$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
		$this->load->view('page/movie_edit', $data);
	}

	public function EditMovie(){
		$this->load->library('form_validation');
		$this->load->helper('file');
		$id = $this->input->post('MovieID');
		$this->form_validation->set_error_delimiters('<p style="color: red;">', '</p>'); 
		$this->form_validation->set_rules('title', 'Title', 'required', array('required' => '*You must provide a string !'));
		$this->form_validation->set_rules('year', 'Year', 'required|numeric|min_length[4]|max_length[5]', array('required' => '*You must provide a number !', 'numeric' => 'You should input a number not a string !', 'min_length' => 'Please input minimal 4 number !', 'max_length' => 'Input maximal 5 number !'));
		$this->form_validation->set_rules('director', 'Director', 'required|max_length[30]', array('required' => '*You must provide a string or number !', 'max_length' => 'The Director field cannot exceed 30 characters in length !'));
		if($_FILES['poster']['size'] != 0){
			$this->form_validation->set_rules('poster', '', 'callback_poster_check');
		}
		if($this->form_validation->run() == false){
			$data['detail'] = $this->movies->showDetail($id);
			$data['style'] = $this->load->view('include/style',NULL,TRUE);
			$data['script'] = $this->load->view('include/script',NULL,TRUE);
			$data['navbar'] = $this->load->view('template/navbar_movie',NULL,TRUE);
			$data['footer'] = $this->load->view('template/footer_movie',NULL,TRUE);
			$this->load->view('page/movie_edit', $data);
		}
		else{
			$title = $this->input->post('title');
			$year = $this->input->post('year');
			$director = $this->input->post('director');
			if($_FILES['poster']['size'] == 0){
				$posterLink = $this->input->post('posterLama');
			}
			else{
				$config['upload_path'] = 'assets/poster/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 1048576;
				$this->load->library('upload', $config);
				if(! $this->upload->do_upload('poster')){
					$error = array('error' => $this->upload->dispay_errors());
				}
				else{
					$posterInfo = $this->upload->data();
					$posterName = $posterInfo['file_name'];
					$posterLink = $config['upload_path'].$posterName;
				}
			}
			$this->movies->UpdateData($id ,$title, $year, $director, $posterLink);
			// echo $id;
			// echo $title;
			redirect('MoviePage');
		}
	}

	public function poster_check($str){
		$allowedType = array('image/jpeg', 'image/png', 'image/pjpeg', 'image/x-png');
		$mime = get_mime_by_extension($_FILES['poster']['name']);
		if(isset($_FILES['poster']['name']) && $_FILES['poster']['name']!=""){
            if(in_array($mime, $allowedType)){
                if($_FILES['poster']['size'] < 1048576){
					return true;
				}
				else{
					$this->form_validation->set_message('poster_check', 'The uploaded file exceeds the maximum allowed size in your PHP configuration file !');
                	return false;
				}
			}
			else{
                $this->form_validation->set_message('poster_check', 'The filetype you are attempting to upload is not allowed !');
                return false;
            }
		}
		else{
            $this->form_validation->set_message('poster_check', 'Please choose a file to upload !');
            return false;
        }
	}
}
?>