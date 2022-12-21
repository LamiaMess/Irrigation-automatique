<?php


class  categorie {
    //put your code here
private $idcategorie;
private $nomcategorie; 


function __construct($idcategorie, $nomcategorie) {
    $this->idcategorie = $idcategorie;
    $this->nomcategorie = $nomcategorie;
   
}

function getIdcategorie() {
    return $this->idcategorie;
}

function getNomcategorie() {
    return $this->nomcategorie;
}


function setIdcategorie($idcategorie) {
    $this->idcategorie = $idcategorie;
}

function setNomcategorie($nomcategorie) {
    $this->nomcategorie = $nomcategorie;
}




}

