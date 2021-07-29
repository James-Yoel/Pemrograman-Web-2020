<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller{
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('tblmovie')
             ->columns('Title', 'Year', 'Director', 'PosterLink', 'Rating')
             ->display_as('PosterLink', 'Poster')
             ->fields('Title', 'Year', 'Director', 'PosterLink', 'Deskripsi', 'Rating')
             ->set_field_upload('PosterLink', 'assets/uploads/poster')
             ->field_type('Rating', 'dropdown', array('PG-13', 'PG', 'G', 'R', 'NC-17'))
             ->callback_edit_field('Deskripsi', array($this, 'edit_description'))
             ->callback_add_field('Deskripsi', array($this, 'add_description'));
        $output = $crud->render();
        $data['crud'] = get_object_vars($output);
        $data['style'] = $this->load->view('include/style', $data, TRUE);
        $data['script'] = $this->load->view('include/script', $data, TRUE);
        $data['navbar'] = $this->load->view('template/navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('template/footer', NULL, TRUE);
        $this->load->view('pages/movies', $data);
    }
    
    function edit_description($value, $primary_key){
        return "<textarea name = 'Deskripsi'>$value</textarea>";
    }
    function add_description(){
        return "<textarea name = 'Deskripsi'></textarea>";
    }
}


?>