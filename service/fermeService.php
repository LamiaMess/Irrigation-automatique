<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
REQUIRE_once RACINE . '/classes/ferme.php';
require_once  RACINE . '/connexion/connexion.php';
require_once RACINE . '/dao/IDao.php';

/**
 * Description of SolService
 *
 * @author Abdelmoula
 */
class FermeService implements IDao {
    //put your code here
    private $connexion;
    function __construct() {
        $this->connexion = new connexion();
    }

    public function create($o) {
        $query = "INSERT INTO ferme (`idferme`,  `nomferme`,`iduser` ) "
        . "VALUES (NULL, '" . $o->getNomferme()  . "','".$_SESSION['sess_user_id']."')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL') ;
    }
    public function delete($o) {
        $query = "delete from ferme where idferme = " . $o->getIdferme()." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    public function findAll() {
        $etds = array();
        $query = "select * from ferme where iduser=".$_SESSION['sess_user_id'] ;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new ferme($e->idferme, $e->nomferme, $e->iduser);
        }
        return $etds;
    }
    public function findById($id) {
        $query = "select * from ferme where idferme = " . $id." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new ferme($e->idferme, $e->nomferme, $e->iduser);
        }
        return $etd;
    }
    public function findByIda($id) {
        $query = "select * from ferme where idferme = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new ferme($e->idferme, $e->nomferme, $e->iduser);
        }
        return $etd;
    }
    public function update($o) {
        $query = "UPDATE `ferme` SET `nomferme` = '" . $o->getNomferme(). "' WHERE `idferme` = '" . $o->getIdferme()."' and `iduser` = '" . $_SESSION['sess_user_id']."'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAllApi() {
        $query = "select * from ferme";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}
}
