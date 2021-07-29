<?php
    Class Student{
        private $Student_ID;
        private $Student_Name;
        private $Student_Nim;
        private $Student_Angkatan;
        private $Student_Jurusan;
        function __construct($sid, $sname, $snim, $sangkatan, $sjurursan){
            $this->Student_ID = $sid;
            $this->Student_Name = $sname;
            $this->Student_Nim = $snim;
            $this->Student_Angkatan = $sangkatan;
            $this->Student_Jurusan = $sjurursan;
        }
        public function getStudent_ID(){
            return $this->Student_ID;
        }
        public function getStudent_Name(){
            return $this->Student_Name;
        }
        public function getStudent_Nim(){
            return $this->Student_Nim;
        }
        public function getStudent_Angkatan(){
            return $this->Student_Angkatan;
        }
        public function getStudent_Jurusan(){
            return $this->Student_Jurusan;
        }
        public function setStudent_ID($str){
            $this->Student_ID = $str;
        }
        public function setStudent_Name($str){
            $this->Student_Name = $str;
        }
        public function setStudent_Nim($str){
            $this->Student_Nim = $str;
        }
        public function setStudent_Angkatan($str){
            $this->Student_Angkatan = $str;
        }
        public function setStuden_Jurusan($str){
            $this->Student_Jurusan = $str;
        }
    }
?>