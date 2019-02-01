<?php

class Chien{

    private $id;
    private $nomElevage;
    private $surnom;
    private $dateNaissance;
    private $sexe;
    private $race;
    private $photo;
    private $listeArticle;

    public function getId(){
        return $this->id;
    }

    public function getNomElevage(){
        return $this->nomElevage;
    }

    public function getSurnom(){
        return $this->surnom;
    }

    public function getDateNaissance(){
        return $this->dateNaissance;
    }

    public function getSexe(){
        return $this->sexe;
    }

    public function getRace(){
        return $this->race;
    }

    public function getPhoto(){
        return $this->photo;
    }

    public function getListeArticle(){
        return $this->listeArticle;
    }
}


?>