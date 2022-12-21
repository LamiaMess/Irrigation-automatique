<?php 


class typeSol {
    //put your code here Id	Nom	HumiditéNominal
    private $idtypesol;
    private $nomtypesol;
    
    
    function __construct($idtypesol, $nomtypesol) {
        $this->idtypesol = $idtypesol;
        $this->nomtypesol = $nomtypesol;
        
    }
    function getIdtypesol() {
        return $this->idtypesol;
    }

    function getNomtypesol() {
        return $this->nomtypesol;
    }
    

    function setIdtypesol($idtypesol) {
        $this->idtypesol = $idtypesol;
    }

    function setNomtypesol($nomtypesol) {
        $this->nomtypesol = $nomtypesol;
    }

    
}
