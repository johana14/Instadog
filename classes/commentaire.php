<?php

class Commentaire{

    private $id;
    private $TexteDuCommentaire;
    private $dateCommentaire;

    public function getId(){
        return $this->id;
    }

    public function getTexteCommentaire(){
        return $this->TexteDuCommentaire;
    }

    public function getDateCommentaire(){
        return $this->dateCommentaire;
    }
}


?>