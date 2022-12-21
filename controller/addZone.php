<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/zoneService.php';
extract($_GET);
$es = new zoneService();
$es->create(new zone(NULL, $nomzone, $idtypesol, $idferme, $_SESSION['sess_user_id']));
header("location:../addplante3.php");