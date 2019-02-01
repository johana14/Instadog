<?php

class Article{

    private $photo;
    private $texte;
    private $listeCommentaires;
    private $datePublication;

    public function getPhoto(){
        return $this->photo;
    }

    public function getTexte(){
        return $this->texte;
    }

    public function getCommentaires(){
        return $this->listeCommentaires;
    }

    public function getListe(){
        return $this->dateNaissance;
    }

    public function getDatePublication(){
        return $this->datePublication;
    }
}