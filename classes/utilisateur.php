<?php

class Utilisateur{

    private $id;
    private $motdePasse;
    private $nomUtilisateur;
    private $datederniereConnexion;

    public function getId(){
        return $this->id;
    }

    public function getMotDePasse(){
        return $this->motdePasse;
    }

    public function getNomUtilisateur(){
        return $this->surnom;
    }

    public function getDateDerniereConnexion(){
        return $this->datederniereConnexion;
    }
}


?>