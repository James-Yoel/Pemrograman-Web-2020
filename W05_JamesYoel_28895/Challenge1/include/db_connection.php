<?php
class Database{
    public $host = "localhost";
	public $username = "root";
	public $dbname = "northwind";
    public $password = "";
    public $conn;

    public function databaseConnect() {
        return $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;",$this->username, $this->password);
    }
}