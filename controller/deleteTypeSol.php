<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/typeSolService.php';
extract($_GET);
$es = new typeSolService();
$es->delete($es->findById($idtypesol));
header("location:../myspace.php");