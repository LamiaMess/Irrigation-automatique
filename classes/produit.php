<?php


class  produit {
    //put your code here
private $idproduit;
private $nomproduit; 
private $idcategorie;
private $description;
private $quantite;
private $idplante;

function __construct($idproduit, $nomproduit, $description, $idcategorie,$quantite,$idplante) {
    $this->idproduit = $idproduit;
    $this->nomproduit = $nomproduit;
    $this->description = $description;
    $this->idcategorie = $idcategorie;
    $this->quantite=$quantite;
    $this->idplante=$idplante;
   
}

function getIdproduit() {
    return $this->idproduit;
}

function getNomproduit() {
    return $this->nomproduit;
}

function getdescription() {
    return $this->description;
}

function getIdcategorie() {
    return $this->idcategorie;
}
function getquantite() {
    return $this->quantite;
}
function getIdplante() {
    return $this->idplante;
}


function setIdproduit($idproduit) {
    $this->idproduit = $idproduit;
}

function setNomproduit($nomproduit) {
    $this->nomproduit = $nomproduit;
}

function setdescription($description) {
     $this->description=$description;
}

function setIdcategorie($idcategorie) {
     $this->idcategorie=$idcategorie;
}
function setquantite($quantite) {
     $this->quantite=$quantite;
}
function setIdplante($idplante) {
     $this->idplante=$idplante;
}



}

