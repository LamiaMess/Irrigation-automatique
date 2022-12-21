<?php
session_start(); 
include_once '../racine.php';
include_once RACINE.'/service/planteService.php';
extract($_GET);
$es = new planteService();
$es->update(new plante($idplante, $nomplante, $idtypeplante, NULL, $_SESSION['sess_user_id']));
header("location:/proinfo/afficherplante.php");


