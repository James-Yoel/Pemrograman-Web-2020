<?php
    Class User{
        private $username;
        private $password;
        private $salt;
        function __construct($uname, $pass, $salt){
            $this->username = $uname;
            $this->password = $pass;
            $this->salt = $salt;
        }
        public function getUserName() {
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getSalt(){
            return $this->salt;
        }
        public function setUserName($str){
            $this->username = $str;
        }
        public function setPassword($str){
            $this->password = $str;
        }
        public function setSalt($str){
            $this->salt = $str;
        }
    }
?>