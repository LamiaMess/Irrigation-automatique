<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/zoneService.php';
extract($_GET);
$es = new zoneService();
$es->delete($es->findById($idzone));
header("location:../myspace.php");

