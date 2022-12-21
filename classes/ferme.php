<?php


class ferme {
    //put your code here
    private $idferme;
    private $nomferme;
    private $iduser;
    
    function __construct($idferme, $nomferme,$iduser) {
        $this->idferme = $idferme;
        $this->nomferme = $nomferme;
        $this->iduser =$iduser;
    }

    function getIdferme() {
        return $this->idferme;
    }

    function getNomferme() {
        return $this->nomferme;
    }

    function getIduser() {
        return $this->iduser;
    }

    function setIdferme($idferme) {
        $this->idferme = $idferme;
    }

    function setNomferme($nomferme) {
        $this->nomferme = $nomferme;
    }

    function setIduser($iduser) {
        $this->iduser = $iduser;
    }

        public function __toString() {
        
    }

}
