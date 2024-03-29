<?php 

	defined('BASEPATH') OR exit('No direct script access allowed !');

	class Movies extends CI_Model{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		public function ShowData()
		{
			
			$query = $this->db->query("SELECT * FROM tblmovie");

			return $query->result_array();
		}

		public function ShowDetail($id)
		{
			$this->db->trans_begin();
			$result = $this->db->query("SELECT * FROM tblmovie WHERE MovieID = '".$id."'");
			$this->db->trans_complete();

			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
				return FALSE;
			}else
			{
				$this->db->trans_commit();
				return $result->result_array();
			}
		}

		public function AddData($title,$year,$director,$posterLink)
		{
			$this->db->query("INSERT INTO tblmovie(Title, Year, Director, PosterLink) VALUES('$title', '$year', '$director', '$posterLink')");
		}

		public function UpdateData($id,$title,$year,$director,$posterLink)
		{
			$this->db->query("UPDATE tblmovie SET Title = '".$title."', Year = '".$year."', Director = '".$director."', PosterLink ='".$posterLink."' WHERE MovieID = '".$id."'");
		}
	}

?>