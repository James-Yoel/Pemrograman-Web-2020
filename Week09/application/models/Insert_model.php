<?php

class Insert_model extends CI_Model{
    public function insert($values){
        $this->db->insert('product', $values);
    }

    function get_category(){
        $queryCategory = $this->db->query("SELECT * FROM category");
        return $queryCategory->result_array();
    }

    function get_supplier(){
        $querySupplier = $this->db->query("SELECT * FROM supplier");
        return $querySupplier->result_array();
    }
}

?>