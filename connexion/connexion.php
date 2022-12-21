<?php


class connexion {
    //put your code here
     private $connexion;
    public function __construct() {
    $host = '127.0.0.1';
    $dbname = 'proinfo';
    $login = 'root';
    $password = 'root';
    try {
        $this->connexion = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
        $this->connexion->query("SET NAMES UTF8");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        }
    }
    function getConnexion() {
        return $this->connexion;
    }
}
