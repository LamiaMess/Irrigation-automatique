<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/typeSolService.php';
extract($_GET);
$es = new typeSolService();
$es->create(new typeSol(NULL, $nomtypesol, $_SESSION['sess_user_id']));
header("location:../myspace.php");