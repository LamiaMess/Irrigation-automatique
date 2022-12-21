<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/plantageService.php';
include_once RACINE.'/service/planteService.php';
extract($_GET);
$es = new plantageService();
$er = new planteService();
$er->delete($er->findById($es->findById($idplantage)->getIdplante()));
$es->delete($es->findById($idplantage));
header("location:../myspace.php");