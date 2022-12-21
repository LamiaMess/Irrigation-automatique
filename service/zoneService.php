<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
REQUIRE_once RACINE . '/classes/zone.php';
require_once  RACINE . '/connexion/connexion.php';
require_once RACINE . '/dao/IDao.php';

/**
 * Description of SolService
 *
 * @author Abdelmoula
 */
class zoneService implements IDao {
    //put your code here
    private $connexion;
    function __construct() {
        $this->connexion = new connexion();
    }
   
    public function create($o) {
        $query = "INSERT INTO zone (`idzone`, `nomzone`, `idtypesol`,`idferme`,`iduser`) "
        . "VALUES (NULL, '" . $o->getNomzone()  . "', '" . $o->getIdtypesol(). "','" . $o->getIdferme(). "','".$_SESSION['sess_user_id']."')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL') ;
    }
    public function delete($o) {
        $query = "delete from zone where idzone = " . $o->getIdzone()." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    public function findAll() {
        $etds = array();
        $query = "select * from zone where iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new zone($e->idzone, $e->nomzone, $e->idtypesol, $e->idferme, $e->iduser);
        }
        return $etds;
    }
    public function findById($id) {
        $query = "select * from zone where idzone = " . $id." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new zone($e->idzone, $e->nomzone, $e->idtypesol, $e->idferme, $e->iduser ,$e->iduser);
        }
        return $etd;
    }
    public function findByIdS($nom) {
        $etds = array();
        $query = "select * from zone where Idferme ='". $nom."' and iduser=".$_SESSION['sess_user_id']."";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new zone($e->idzone, $e->nomzone, $e->idtypesol, $e->idferme, $e->iduser);
        }
        return $etds;
    }
    public function update($o) {
        $query = "UPDATE `zone` SET `nomzone` = '" . $o->getNomzone(). "',"
                . "`idtypesol` ='" . $o->getIdtypesol()  . "' WHERE `idzone` = " . $o->getIdzone()." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    
    public function findAllApi() {
        $query = "select * from zone";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}
}

