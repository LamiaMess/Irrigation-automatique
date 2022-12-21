<?php


include_once RACINE . '/classes/plante.php';
include_once RACINE . '/connexion/connexion.php';
include_once RACINE . '/dao/IDao.php';

class planteService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new connexion();
    }

    public function create($o) {
        $query = "INSERT INTO plante (`idplante`, `nomplante`,`idtypeplante`,`idzone`) "
        . "VALUES (NULL, '" . $o->getNomplante(). "','" . $o->getIdtypeplante(). "','" . $o->getIdzone(). "')";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from plante where idplante = " . $o->getIdplante();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from plante";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new plante($e->idplante, $e->nomplante, $e->idtypeplante, $e->idzone);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from plante where idplante = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new plante($e->idplante, $e->nomplante, $e->idtypeplante, $e->idzone);
        }
        return $etd;
    }
    
    public function findByIdS($id) {
        $etds = array();
        $query = "select * from plante where idzone ='". $id."'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new plante($e->idplante, $e->nomplante, $e->idtypeplante, $e->idzone);
        }
        return $etds;
    }

    public function update($o) {
        $query = "UPDATE `plante` SET `nomplante` = '" . $o->getNomplante() . "',`idtypeplante` ="
                . "'" . $o->getidtypeplante(). "' WHERE `idplante` = '". $o->getIdplante()."'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
     
    public function findAllApi() {
        $query = "select * from plante";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}


}
