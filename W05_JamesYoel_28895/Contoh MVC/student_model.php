<?php
class Student{
    private $_id;
    private $_name;

    public function setID($ID) {
        $this->_id = $ID;
    }
    public function setName($Name) {
        $this->_name = $Name;
    }
    public function getID() {
        return $this->_id;
    } 
    public function getName() {
        return $this->_name;
    }
}
?>