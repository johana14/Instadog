<?php

class Commentaire{

    private $id;
    private $texteCommentaire;
    private $dateCommentaire;

    public function getId(){
        return $this->id;
    }

    public function getTexteCommentaire(){
        return $this->texteCommentaire;
    }

    public function getDateCommentaire(){
        return $this->dateCommentaire;
    }
}


?>