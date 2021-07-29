<?php

class database{
    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $db = "malasngoding";
    var $conn;
    var $query;

    function __construct(){
        $this->conn = new mysqli($this->host, $this->uname, $this->pass, $this->db);
    }

    function tampil_data(){
        $query = 'SELECT * FROM user';
        $data = $this->conn->query($query);
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
}

?>