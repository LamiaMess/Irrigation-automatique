<?php


class typePlante {
    //put your code here
private $idtypeplante;
private $nomtypeplante; //Id	Nom	DatePlantage	TemperatureNominal	HumiditéNominal
private $humminarrose;
private $hummaxarrose;
private $tminarrose;
private $tmaxarrose;
private $iduser;

function __construct($idtypeplante, $nomtypeplante, $humminarrose, $hummaxarrose, $tminarrose, $tmaxarrose,$iduser) {
    $this->idtypeplante = $idtypeplante;
    $this->nomtypeplante = $nomtypeplante;
    $this->humminarrose = $humminarrose;
    $this->hummaxarrose = $hummaxarrose;
    $this->tminarrose = $tminarrose;
    $this->tmaxarrose = $tmaxarrose;
    $this->iduser = $iduser;
}
function getIdtypeplante() {
    return $this->idtypeplante;
}

function getNomtypeplante() {
    return $this->nomtypeplante;
}

function getHumminarrose() {
    return $this->humminarrose;
}

function getHummaxarrose() {
    return $this->hummaxarrose;
}

function getTminarrose() {
    return $this->tminarrose;
}

function getTmaxarrose() {
    return $this->tmaxarrose;
}
function getIduser() {
    return $this->iduser;
}
function setIdtypeplante($idtypeplante) {
    $this->idtypeplante = $idtypeplante;
}

function setNomtypeplante($nomtypeplante) {
    $this->nomtypeplante = $nomtypeplante;
}

function setHumminarrose($humminarrose) {
    $this->humminarrose = $humminarrose;
}

function setHummaxarrose($hummaxarrose) {
    $this->hummaxarrose = $hummaxarrose;
}

function setTminarrose($tminarrose) {
    $this->tminarrose = $tminarrose;
}

function setTmaxarrose($tmaxarrose) {
    $this->tmaxarrose = $tmaxarrose;
}

function setIduser($iduser) {
    $this->iduser = $iduser;
}
}

