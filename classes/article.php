<?php

class Article{

    private $id;
    private $photo;
    private $texte;
    private $listeCommentaires;
    private $dateDePublication;

    public function getId(){
        return $this->id;
    }
    
    public function getPhoto(){
        return $this->photo;
    }

    public function getTexte(){
        return $this->texte;
    }

    public function getCommentaires(){
        return $this->listeCommentaires;
    }

    public function getNaissance(){
        return $this->dateNaissance;
    }

    public function getDatePublication(){
        return $this->dateDePublication;
    }
}