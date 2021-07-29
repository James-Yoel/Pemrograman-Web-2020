<?php

    class Hewan{
        public $nama;
        public $apakahHidup;

        function __construct($nama){
            $this->nama = $nama;
            $apakahHidup = true;
            echo $nama. " adalah hewan hidup <br/>";
        }
        public function makan(){
            return "nyam nyam ";
        }
        public function tidur(){
            return "zzzz ";
        }
        public function berjalan(){
            return "tuk ku tuk ";
        }
        function __destruct(){
            $apakahHidup = false;
            echo $this->nama." telah wafat <br/>";
        }
    }

    $Momo = new Hewan("Momo");
    $Mimi = new Hewan("Mimi");
    $Mumu = new Hewan("Mumu");
    echo "Momo suka makan, ".$Momo->makan().$Momo->makan()."<br/>";
    echo "Mimi suka tidur, ".$Mimi->tidur().$Mimi->tidur().$Mimi->tidur().$Mimi->tidur()."<br/>";
    echo "Mumu suka berjalan, ".$Mumu->berjalan()."<br/>";
?>