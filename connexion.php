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
        $PARAM_mot_passe = 'Inst@D0g'; // le mot de passe de l'utilisateur pour se connecter
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
        $stmt = $this->connexion->prepare("SELECT *  FROM Utilisateur WHERE id = :id");
        $stmt->execute(array('id' => $id,));
        $utilisateur = $stmt->fetchObject('Utilisateur');
        return $utilisateur;
    }

    public function getUserinfo($username)
    {
        $stmt = $this->connexion->prepare(
            "SELECT * FROM Utilisateur WHERE username = :username");
        $stmt->execute(array('username' => $username));   
        $userProfile = $stmt->fetchObject("Utilisateur");
        return $userProfile;
    }

    public function insertUser($username, $password, $dateDernierConnexion)
    {
        $stmt = $this->connexion->prepare(
            "INSERT INTO Utilisateur (username, password, dateDernierConnexion)
            VALUES (:username, :password, :dateDernierConnexion)");
        $stmt->execute(array(
            'username' => $username,
            'password' => $password,
            'dateDernierConnexion' => $dateDernierConnexion));
            $id = $this->connexion->lastInsertId();
            header("Location: profil_utilisateur.php?id=$id");

    }

/* -------------***************************----------------
----------------******FONCTIONS CHIEN******----------------
----------------***************************---------------*/

    public function getAllChien()
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM Chien
            INNER JOIN Utilisateur
            ON chien.user_id = utilisateur.id");
        $stmt->execute();
        $chien = $stmt->fetchAll(PDO::FETCH_CLASS, 'Chien');
        return $chien;
    }

    public function getChienById($id)
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM Chien
            INNER JOIN Utilisateur
            ON Chien.user_id = Utilisateur.id
            WHERE Chien.id = :id");
        $stmt->execute(array('id' => $id));
        $chien = $stmt->fetchObject('Chien');
        return $chien;
    }

    public function insertChien ($nomElevage, $surNom, $dateNaissance, $sexe, $race, $user_id, $photo){
        $stmt = $this->connexion->prepare(
            "INSERT INTO Chien (nomElevage, surNom, dateNaissance, sexe, race, user_id, photo) 
            value (:nomElevage, :surNom, :dateNaissance, :sexe, :race, :user_id, :photo)");
        $stmt->execute (array (
            'nomElevage' => $nomElevage,
            'surNom' => $surNom,
            'dateNaissance' => $dateNaissance,
            'sexe' => $sexe,
            'race' => $race,
            'user_id' => $user_id,
            'photo' => $photo,));
        $id = $this->connexion->lastInsertId();
        header("Location: profil_chien.php?chien=$id");
        return $id;
        }

/* -------------***************************----------------
----------------******FONCTIONS ARTICLE****----------------
----------------***************************---------------*/


    public function getAllArticle($id)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM Article
            INNER JOIN Chien
            ON Article.id_chien = Chien.id
            WHERE Chien.id = :id");
        $stmt->execute(array('id' => $id));
        $article = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');
        return $article;
    }

    public function getArticleById(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT * FROM Article WHERE Article.id = :id");
        $stmt->execute(array('id' => $id));
        $article = $stmt->fetchObject('Article');
        return $article;
    }

    public function insertArticle ($photo, $texte, $datePublication, $id_chien){
        $stmt = $this->connexion->prepare(
            "INSERT INTO Article (photo, texte, datePublication, id_chien) 
            value (:photo, :texte, :datePublication, :id_chien)"
        );
        $stmt = $this->connexion->prepare(array (
            'photo' => $photo,
            'texte' => $texte,
            'datePublication' => $datePublication,
            'id_chien' => $id_chien));
        $id = $this->connexion->lastInsertId();
        header("Location: article.php?id=$id");
        return $id;
    }

/* ---------*******************************------------
------------******FONCTIONS COMMENTAIRE****------------
------------*******************************-----------*/

    public function getArticleCommentaires(int $id)
    {
        $stmt = $this->connexion->prepare("SELECT *  FROM Commentaires
            INNER JOIN Utilisateur
            ON Commentaires.user_id = Utilisateur.id
            INNER JOIN Article
            ON Commentaires.id_Article = Article.id
            WHERE Article.id = :id");
        $stmt->execute(array('id' => $id));
        $resultat = $stmt->fetchAll(PDO::FETCH_CLASS, 'Commentaire');
        return $resultat;
    }

    public function setCommentaire ($TexteDuCommentaire, $dateCommentaire, $user_id, $id_article){
        // on prépare notre requête 
        $stmt = $this->connexion->prepare(
            "INSERT INTO Commentaires (TexteDuCommentaire, dateCommentaire, user_id, id_article) 
            value (:TexteDuCommentaire, :dateCommentaire, :user_id, :id_article)");
        // on exécute la requête 
        $stmt = $this->connexion->prepare(array (
            'TexteDuCommentaire' => $TexteDuCommentaire,
            'dateCommentaire' => $dateCommentaire,
            'user_id' => $user_id,
            'id_article' => $id_article));
    }
   
}
