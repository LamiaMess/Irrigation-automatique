<?php
include_once '../racine.php';
include_once RACINE.'/service/fermeService.php';
extract($_GET);
$es = new fermeService();
$es->delete($es->findById($id));
header("location:../afficherFerme.php");
