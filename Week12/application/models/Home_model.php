<?php

defined('BASEPATH') OR exit('No direct script access allowed !');
class Home_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    function loginUser($email, $password){
        $result = $this->db->query("SELECT * FROM admin WHERE email_admin = '".$email."' AND password = '".$password."';");
        return $result;
    }
}

?>