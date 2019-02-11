<?php
/* ------------------------------------------------------
Classe Connexion
--------------------------------------------------------*/

require_once 'classes/article.php';
require_once 'classes/chien.php';
require_once 'classes/commentaire.php';
require_once 'classes/utilisateur.php';
class Connexion
{
    private $connexion;
    public function __construct()
    {
        $PARAM_hote = 'localhost'; // le chemin vers le serveur
        $PARAM_port = '3306'; // le port de connexion à la base de données
        $PARAM_nom_bd = 'InstaDog'; // le nom de la base de données
        $PARAM_utilisateur = 'adminInstaDog'; // Le nom d'utilisateur pour se connecter
        $PARAM_mot_passe = 'digital2018'; // le mot de passe de l'utilisateur pour se connecter
        try {
            $this->connexion = new PDO('mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br/>';
        }
    }

    public function getConnexion()
    {
        return $this->connexion;
    }

    public function getLastId(){

        return $this->connexion->lastInsertId();
    }

/* -------------***************************---------------
----------------******FONCTIONS USER*******---------------
----------------***************************---------------*/
    public function getUserChien($id)
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM utilisateur WHERE id = :id");
        $stmt->execute(array(
            'id' => $id,
        ));
        $utilisateur = $stmt->fetchObject('Utilisateur');
        return $utilisateur;
    }

    public function getUsersByusername($username)
    {
        $stmt = $this->connexion->prepare(
            "SELECT *FROM utilisateur WHERE username = :username");
        $stmt->execute(array('username' => $username));   
        $userProfile = $stmt->fetchObject("Profil");
        return $userProfile;
    }

    public function getChienById(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM chien
            INNER JOIN utilisateur
            ON chien.user_id = utilisateur.id
            WHERE chien.id = :id");
        $stmt->execute(array('id' => $id));
        $chien = $stmt->fetchObject('Chien');
        return $chien;
    }

    public function insertUser($username, $password, $dateDernierConnexion)
    {
        $stmt = $this->connexion->prepare(
            "INSERT INTO utilisateur (username, password, dateDernierConnexion)
            VALUES (:username, :password, :dateDernierConnexion)");
        $stmt->execute(array(
            'username' => $username,
            'password' => $password,
            'dateDernierConnexion' => $dateDernierConnexion));
        $id = $this->connexion->lastInsertId();
    }

/* -------------***************************----------------
----------------******FONCTIONS CHIEN******----------------
----------------***************************---------------*/


    public function getAllChien()
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM chien
            INNER JOIN utilisateur
            ON chien.user_id = utilisateur.id");
        $stmt->execute();
        $chien = $stmt->fetchAll(PDO::FETCH_CLASS, 'Chien');
        return $chien;
    }

    public function insertChien ($nomElevage, $surNom, $dateNaissance, $sexe, $race, $photo){
        // on prépare notre requête 
        $stmt = $this->connexion->prepare(
            "INSERT INTO chien (nomElevage, surNom, dateNaissance, sexe, race, photo) 
            value (:nomElevage, :surNom, :dateNaissance, :sexe, :race, :photo)");
        // on exécute la requête 
        $stmt->execute (array (
            'nomElevage' => $nomElevage,
            'surNom' => $surNom,
            'dateNaissance' => $dateNaissance,
            'sexe' => $sexe,
            'race' => $race,
            'photo' => $photo));
        $id = $this->connexion->lastInsertId();
        return $id;
        }

/* -------------***************************----------------
----------------******FONCTIONS ARTICLE****----------------
----------------***************************---------------*/


    public function getAllArticle(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM article
            INNER JOIN chien
            ON article.id_chien = chien.id
            WHERE chien.id = :id");
        $stmt->execute(array('id' => $id));
        $article = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        return $article;
    }

    public function getArticleById(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM article WHERE article.id = :id");
        $stmt->execute(array('id' => $id));
        $article = $stmt->fetchObject('Article');
        return $article;
    }

    public function setArticle ($photo, $texte, $datePublication){
        // on prépare notre requête 
        $stmt = $this->connexion->prepare(
            "INSERT INTO article (photo, texte, datePublication) 
            value (:photo, :texte, :datePublication)"
        );
        // on exécute la requête 
        $stmt = $this->connexion->prepare(array (
            'photo' => $photo,
            'texte' => $texte,
            'datePublication' => $datePublication));
    }

/* ---------*******************************------------
------------******FONCTIONS COMMENTAIRE****------------
------------*******************************-----------*/

    public function getArticleCommentaires(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM commentaires
            INNER JOIN utilisateur
            ON commentaires.user_id = utilisateur.id
            INNER JOIN article
            ON commentaires.id_Article = article.id
            WHERE article.id = :id");
        $stmt->execute(array('id' => $id));
        $resultat = $stmt->fetchAll(PDO::FETCH_CLASS, 'Commentaire');
        return $resultat;
    }

    public function setCommentaire ($TexteDuCommentaire, $dateCommentaire, $user_id, $id_article){
        // on prépare notre requête 
        $stmt = $this->connexion->prepare(
            "INSERT INTO commentaires (TexteDuCommentaire, dateCommentaire, user_id, id_article) 
            value (:TexteDuCommentaire, :dateCommentaire, :user_id, :id_article)");
        // on exécute la requête 
        $stmt = $this->connexion->prepare(array (
            'TexteDuCommentaire' => $TexteDuCommentaire,
            'dateCommentaire' => $dateCommentaire,
            'user_id' => $user_id,
            'id_article' => $id_article));
    }
   
}
