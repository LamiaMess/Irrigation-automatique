<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/produitService.php';
include_once RACINE.'/service/categorieService.php';
include_once RACINE.'/service/planteService.php';
//$_SESSION['idproduit'] = $idproduit;
extract($_GET);
$es = new produitService();


$es->create(new produit(NUll, $nomproduit, $description, $idcategorie,$quantite,$idplante));

header("location:../addimage.php");