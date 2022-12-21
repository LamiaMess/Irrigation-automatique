<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/plantageService.php';
include_once RACINE.'/service/planteService.php';
extract($_GET);
//$er = new plantageService();
$es = new planteService();
//$er->delete($er->findByIdA($idplante));
$es->delete($es->findById($idplante));
header("location:../myspace.php");
