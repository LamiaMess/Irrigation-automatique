<?php
session_start();
include_once '../racine.php';
include_once RACINE.'/service/fermeService.php';
extract($_GET);
$es = new fermeService();
$es->create(new ferme(NULL, $nomferme, $_SESSION['sess_user_id']));
header("location:../addzone2.php");

