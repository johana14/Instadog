<?php

class Utilisateur{

    private $id;
    private $password;
    private $username;
    private $dateDerniereConnexion;

    public function getId(){
        return $this->id;
    }

    public function getMotDePasse(){
        return $this->password;
    }

    public function getNomUtilisateur(){
        return $this->username;
    }

    public function setDateDerniereConnexion($dateDerniereConnexion){
        $this->dateDerniereConnexion = $dateDerniereConnexion;
    }

    public function getDateDerniereConnexion(){
        return $this->dateDerniereConnexion;
    }
}

class Profil extends Utilisateur{
    private $listeChiens;

    public function getListeChiens() {
        return $this->listeChiens;
    }

    public function setListeChiens($listeChiens) {
        $this->listeChiens = $listeChiens;
    }
}


?>
