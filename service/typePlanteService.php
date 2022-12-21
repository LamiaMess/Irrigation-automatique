<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once RACINE . '/classes/typePlante.php';
include_once RACINE . '/connexion/connexion.php';
include_once RACINE . '/dao/IDao.php';
/**
 * Description of PlanteService
 *
 * @author Abdelmoula
 */
class typePlanteService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new connexion();
    }

    public function create($o) {
        $query = "INSERT INTO typeplante (`idtypeplante`, `nomtypeplante`, `humminarrose`,"
                . " `hummaxarrose`, `tminarrose`, `tmaxarrose`, `iduser`) "
        . "VALUES (NULL, '" . $o->getNomtypeplante(). "',"
                . " '" . $o->getHumminarrose(). "', '". $o->getHummaxarrose(). "','" . $o->getTminarrose(). "','" . $o->getTmaxarrose(). "','".$_SESSION['sess_user_id']."')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from typeplante where idtypeplante = " . $o->getIdtypeplante()." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    
    public function findAll() {
        $etds = array();
        $query = "select * from typeplante where iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new typePlante($e->idtypeplante, $e->nomtypeplante, $e->humminarrose,
                    $e->hummaxarrose, $e->tminarrose, $e->tmaxarrose, $e->iduser);
        }
        return $etds;
    }
    public function findById($id) {
        $etd = array();
        $query = "select * from typeplante where idtypeplante = " . $id." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new typePlante($e->idtypeplante, $e->nomtypeplante, $e->humminarrose,
                    $e->hummaxarrose, $e->tminarrose, $e->tmaxarrose, $e->iduser);
        }
        return $etd;
    } 
   public function findByIdS($id) {
        $etd = array();
        $query = "select * from typeplante where idplante = " . $id." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new typePlante($e->idtypeplante, $e->nomtypeplante, $e->humminarrose,
                    $e->hummaxarrose, $e->tminarrose, $e->tmaxarrose, $e->iduser);
        }
        return $etd;
    } 
    public function update($o) {
        $query = "UPDATE `typeplante` SET `nomtypeplante` = '" . $o->getNomtypeplante() .
                "',`humminarrose` = '" . $o->getHumminarrose() . "',`hummaxarrose` = '" . $o->getHummaxarrose() .
                "',`tminarrose` = '" . $o->getTminarrose() . "',`tmaxarrose` = '" . $o->getTmaxarrose() . "' WHERE `idtypeplante` = " 
                . $o->getIdtypeplante()."' and '".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
     
    public function findAllApi() {
        $query = "select * from typeplante";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}

}
