<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/plantageService.php';
extract($_GET);
$es = new plantageService();
$es->create(new plantage(NULL, $idplante, $nombreplante));
header("location:../afficherPlantage.php");

