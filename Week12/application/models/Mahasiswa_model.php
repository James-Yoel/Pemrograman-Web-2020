<?php

defined('BASEPATH') OR exit('No direct script access allowed !');
class Mahasiswa_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    function getMahasiswa(){
        $result = $this->db->query("SELECT * FROM mahasiswa");
        return $result->result_array();
    }

    function deleteMahasiswa($id){
        $this->db->where('id_mahasiswa', $id);
        $this->db->delete('mahasiswa');
    }
}

?>