<?php

defined('BASEPATH') OR exit('No direct script access allowed !');
class Dosen_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function getDosen(){
        $result = $this->db->query("SELECT * FROM dosen");
        return $result->result_array();
    }

    function deleteDosen($id){
        $this->db->where('id_dosen', $id);
        $this->db->delete('dosen');
    }
}

?>