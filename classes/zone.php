<?php


class zone {
    //put your code here
    private $idzone;
    private $nomzone;
    private $idtypesol;
    private $idferme;
    private $iduser;

    
    function __construct($idzone, $nomzone, $idtypesol, $idferme,$iduser) {
        $this->idzone = $idzone;
        $this->nomzone = $nomzone;
        $this->idtypesol = $idtypesol;
        $this->idferme = $idferme;
        $this->idfuser = $iduser;
    }
   
    function getIdzone() {
        return $this->idzone;
    }

    function getNomzone() {
        return $this->nomzone;
    }

    function getIdtypesol() {
        return $this->idtypesol;
    }

    function getIdferme() {
        return $this->idferme;
    }

    function getIduser() {
        return $this->iduser;
    }
    function setIdzone($idzone) {
        $this->idzone = $idzone;
    }

    function setNomzone($nomzone) {
        $this->nomzone = $nomzone;
    }

    function setIdtypesol($idtypesol) {
        $this->idtypesol = $idtypesol;
    }

    function setIdferme($idferme) {
        $this->idferme = $idferme;
    }


    function setIduser($idferme) {
        $this->idferme = $idferme;
    }

}
