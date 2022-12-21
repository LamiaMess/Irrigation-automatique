<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/planteService.php';
include_once RACINE.'/service/plantageService.php';
extract($_GET);
$es = new planteService();
$e = new planteService();
$er = new plantageSErvice();
$es->create(new plante(NUll, $nomplante, $idtypeplante, $idzone));
header("location:../myspace.php");