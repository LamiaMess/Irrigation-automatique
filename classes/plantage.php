<?php


class plantage {
    //put your code here
    private $idplantage;
    private $idplante;
    private $nombreplante;
    
    function __construct($idplantage, $idplante, $nombreplante) {
        $this->idplantage = $idplantage;
        $this->idplante = $idplante;
        $this->nombreplante = $nombreplante;
    }
    function getIdplantage() {
        return $this->idplantage;
    }

    function getIdplante() {
        return $this->idplante;
    }

    function getNombreplante() {
        return $this->nombreplante;
    }

    function setIdplantage($idplantage) {
        $this->idplantage = $idplantage;
    }

    function setIdplante($idplante) {
        $this->idplante = $idplante;
    }

    function setNombreplante($nombreplante) {
        $this->nombreplante = $nombreplante;
    }
}
