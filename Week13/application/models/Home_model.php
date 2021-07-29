<?php

defined('BASEPATH') OR exit('No direct script access allowed !');
class Home_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function checkPassword($password){
        $result = $this->db->query("SELECT * FROM User WHERE Password = '".$password."';");
        return $result;
    }

    public function ShowData()
	{	
		$query = $this->db->query("SELECT * FROM tblbook");
		return $query->result_array();
    }
    
    public function AddData($title, $year, $publisher, $author, $posterName)
	{
		$this->db->query("INSERT INTO tblbook(Title, Year, Publisher, Author, PosterLink) VALUES('$title', '$year', '$publisher', '$author', '$posterName')");
    }
    
    public function ViewData($id){
        $result = $this->db->query("SELECT * FROM tblbook WHERE BookID = '".$id."'");
        return $result->result_array();
    }

    public function EditData($id, $title, $year, $publisher, $author, $posterName){
        $this->db->query("UPDATE tblbook SET Title = '".$title."', Year = '".$year."', Publisher = '".$publisher."', Author = '".$author."', PosterLink ='".$posterName."' WHERE BookID = '".$id."'");
    }

    public function DeleteData($id){
        $this->db->query("DELETE FROM tblbook WHERE BookID = '".$id."';");
    }
}

?>