<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/typePlanteService.php';
extract($_GET);
$es = new typePlanteService();
$es->delete($es->findById($idtypeplante ));
header("location:../myspace.php");
