<?php


class  plante {
    //put your code here
private $idplante;
private $nomplante; 
private $idtypeplante;
private $idzone;

function __construct($idplante, $nomplante, $idtypeplante, $idzone) {
    $this->idplante = $idplante;
    $this->nomplante = $nomplante;
    $this->idtypeplante = $idtypeplante;
    $this->idzone = $idzone;
}

function getIdplante() {
    return $this->idplante;
}

function getNomplante() {
    return $this->nomplante;
}

function getIdtypeplante() {
    return $this->idtypeplante;
}

function getIdzone() {
    return $this->idzone;
}

function setIdplante($idplante) {
    $this->idplante = $idplante;
}

function setNomplante($nomplante) {
    $this->nomplante = $nomplante;
}

function setIdtypeplante($idtypeplante) {
    $this->idtypeplante = $idtypeplante;
}

function setIdzone($idzone) {
    $this->idzone = $idzone;
}


}

