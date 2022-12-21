<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
REQUIRE_once RACINE . '/classes/plantage.php';
require_once  RACINE . '/connexion/connexion.php';
require_once RACINE . '/dao/IDao.php';

/**
 * Description of SolService
 *
 * @author Abdelmoula
 */
class plantageService implements IDao {
    //put your code here
    private $connexion;
    function __construct() {
        $this->connexion = new connexion();
    }
   
    public function create($o) {
        $query = "INSERT INTO plantage (`idplantage`, `idplante`, `nombreplante`) "
        . "VALUES (NULL, '" . $o->getIdplante() . "','" . $o->getNombreplante() . "')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL') ;
    }
    
    public function delete($o) {
        $query = "delete from plantage where idplantage = " . $o->getIdplantage();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    public function findAll() {
        $etds = array();
        $query = "select * from plantage";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new plantage($e->idplantage, $e->idplante, $e->nombreplante);
        }
        return $etds;
    }
    public function findById($id) {
        $query = "select * from plantage where idplantage = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new plantage($e->idplantage, $e->idplante, $e->nombreplante);
        }
        return $etd;
    }           
    public function findByIdA($id) {
        $query = "select * from plantage where idplante = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new plantage($e->idplantage, $e->idplante, $e->nombreplante);
        }
        return $etd;
    }           
    public function update($o) {
        $query = "UPDATE `plantage` SET `nombreplante` = '" . $o->getNombreplante()  . "',"
                ." WHERE `ferme`.`idplantage` = " . $o->getIdplantage();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    
    public function findAllApi() {
        $query = "select * from plantage";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}
}

