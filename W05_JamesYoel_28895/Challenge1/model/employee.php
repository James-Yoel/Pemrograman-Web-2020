<?php
class Employee{
    private $firstName;
    private $lastName;
    private $title;
    private $extension;
    private $birthDate;
    private $address;
    private $city;
    private $homePhone;

    public function __construct($firstName, $lastName, $title, $extension, $birthDate, $address, $city, $homePhone){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
        $this->extension = $extension;
        $this->birthDate = $birthDate;
        $this->address = $address;
        $this->city = $city;
        $this->homePhone = $homePhone;
    }

    public function getFirstName(){
        return $this->firstName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getExtension(){
        return $this->extension;
    }

    public function getBirthDate(){
        return $this->birthDate;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCity(){
        return $this->city;
    }

    public function getHomePhone(){
        return $this->homePhone;
    }
}
?>