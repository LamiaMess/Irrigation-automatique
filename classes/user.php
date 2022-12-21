<?php

class user{
    private $iduser;
    private $name;
    private $username;
    private $email;
    private $phone;
    private $password;
    
    function __construct($iduser, $name, $username, $email, $phone,$password) {
        $this->iduser = $iduser;
        $this->name = $name;
        $this->username = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;  
    }

//getters    
    function getIduser() {
        return $this->iduser;
    }

    function getName() {
        return $this->name;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }
    function getphone() {
        return $this->phone;
    }
    function getpassword() {
        return $this->password;
    }



//Setters

    function setIduser($iduser) {
        $this->iduser = $iduser;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    function setPhone($phone) {
        $this->phone = $phone;
    }
    function setPasswork($password) {
        $this->password = $password;
    }


}
