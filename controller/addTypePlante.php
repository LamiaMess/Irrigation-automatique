<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/typePlanteService.php';
extract($_GET);
$es = new typePlanteService();
$es->create(new typePlante(NULL, $nomtypeplante, $humminarrose, $hummaxarrose, $tminarrose, $tmaxarrose, $_SESSION['sess_user_id']));
header("location:../addplante4.php");