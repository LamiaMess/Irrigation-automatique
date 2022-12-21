<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/zoneService.php';
extract($_GET);
$es = new zoneService(); 
$es->update(new zone($idzone, $nomzone, $idtypesol, NULL, $_SESSION['sess_user_id']));
header("location:/proinfo/afficherZone.php");

 