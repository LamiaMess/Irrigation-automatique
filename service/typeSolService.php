<?php

include_once RACINE . '/classes/typeSol.php';
include_once RACINE . '/connexion/connexion.php';
include_once RACINE . '/dao/IDao.php';

class typeSolService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new connexion();
    }

    public function create($o) {
        $query = "INSERT INTO typesol (`idtypesol`, `nomtypesol`) "
        . "VALUES (NULL, '" . 'nomtypesol'. "')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from typesol where idtypesol = " . $o->getIdtypesol()." and ".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from typesol";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new typeSol($e->idtypesol, $e->nomtypesol);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from typesol where idtypesol = " . $id." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new typeSol($e->idtypesol, $e->nomtypesol);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `typesol` SET `nomtypesol` = '" . $o->getNomtypesol() ."'"
                ." WHERE `idtypesol` = ". $o->getIdtypesol()." and iduser=".$_SESSION['sess_user_id'];
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
     
    public function findAllApi() {
        $query = "select * from typesol";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}