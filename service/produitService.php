<?php


include_once RACINE . '/classes/produit.php';
include_once RACINE . '/connexion/connexion.php';
include_once RACINE . '/dao/IDao.php';

class produitService implements IDao {
    //put your code here
    private $connexion;
    
    function __construct() {
        $this->connexion = new connexion();
    }

    public function create($o) {
        $query = "INSERT INTO produit (`idproduit`, `nomproduit`, `description`, `idcategorie`,`quantite`,`idplante`) "
        . "VALUES (NULL, '" . $o->getNomproduit(). "','" . $o->getdescription(). "','" . $o->getIdcategorie(). "','" . $o->getquantite(). "','" . $o->getIdplante(). "')";
        $req = $this->connexion->getConnexion()->prepare($query);
       
        $req->execute() or die('Erreur SQL');
    }

    public function delete($o) {
        $query = "delete from produit where idproduit = " . $o->getIdproduit();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from produit";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new produit($e->idproduit, $e->nomproduit, $e->description, $e->idcategorie,$e->quantite,$e->idplante);
        }
        return $etds;
    }

    public function findById($id) {
        $query = "select * from produit where idproduit = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new produit($e->idproduit, $e->nomproduit, $e->description, $e->idcategorie,$e->quantite,$e->idplante);
        }
        return $etd;
    }
    
    public function findByIdS($id) {
        $etds = array();
        $query = "select * from produit where idcategorie ='". $id."'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new produit($e->idproduit, $e->nomproduit, $e->description, $e->idcategorie,$e->quantite,$e->idplante);
        }
        return $etds;
    }

    public function update($o) {
        $query = "UPDATE `produit` SET `nomproduit` = '" . $o->getNomproduit() . "',`idplante` ="
                . "'" . $o->getidplante(). "' WHERE `idproduit` = '". $o->getIdproduit()."'";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
     
    public function findAllApi() {
        $query = "select * from produit";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
}


}
