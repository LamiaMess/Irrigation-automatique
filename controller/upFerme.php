<?php
session_start();
include_once '../racine.php';
include_once RACINE.'/service/fermeService.php';
extract($_GET);
$es = new fermeService();
$es->update(new ferme($idferme, $nomferme, $_SESSION['sess_user_id']));
header('location:../afficherFerme.php');


