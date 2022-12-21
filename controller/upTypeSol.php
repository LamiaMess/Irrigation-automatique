<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/typeSolService.php';
extract($_GET);
$es = new typeSolService();
$es->update(new typeSol($idtypesol, $nomtypesol, $_SESSION['sess_user_id']));
header("location:/proinfo/afficherTypeSol.php");

