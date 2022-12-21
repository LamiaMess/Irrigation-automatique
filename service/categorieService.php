<?php

include_once RACINE . '/classes/categorie.php';
include_once RACINE . '/connexion/connexion.php';
include_once RACINE . '/dao/IDao.php';

class categorieService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new connexion();
    }

    public function create($o) {
        $query = "INSERT INTO categorie (`idcategorie`, `nomcategorie`,`iduser`) "
        . "VALUES (NULL, '" . 'nomcategorie'. "','".$_SESSION['sess_user_id']."')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from categorie where idcategorie = " . $o->getIdcategorie()." and ".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from categorie ";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new categorie($e->idcategorie, $e->nomcategorie);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from categorie where idcategorie = " . $id." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new categorie($e->idcategorie, $e->nomcategorie, $e->iduser);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `categorie` SET `nomcategorie` = '" . $o->getNomcategorie() ."'"
                ." WHERE `idcategorie` = ". $o->getIdcategorie()." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
     
    public function findAllApi() {
        $query = "select * from categorie";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}