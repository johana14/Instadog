<?php
require_once ('classes/article.php');
require_once ('classes/chien.php');
require_once ('classes/commentaire.php');
require_once ('classes/profil.php');
require_once ('classes/utilisateur.php');
class Connexion
{

    private $connexion;

    public function __construct()
    {

        $PARAM_hote = 'localhost';
        $PARAM_port = '3306';
        $PARAM_nom_bd = 'InstaDog';
        $PARAM_utilisateur = 'adminInstaDog';
        $PARAM_mot_passe = 'digital2018';

        try {
            $this->connexion = new PDO(
                'mysql:host=' . $PARAM_hote . ';dbname=' . $PARAM_nom_bd,
                $PARAM_utilisateur,
                $PARAM_mot_passe
            );
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br/>';
        }


    }
    public function getConnexion()
    {
        return $this->connexion;

    }

    //recuperer les donnés de la base pour lutilisiteur
    public function selectUserById(int $id)
    {

        $stmt = $this->connexion->prepare(
            "SELECT *  FROM utilisateur WHERE id = :id"
        );
        $stmt->execute(array('id' => $id));

        $utilisateur = $stmt->fetchObject('Utilisateur');

        return $utilisateur;
    }
    
    public function getChienById(int $id)
    {

        $stmt = $this->connexion->prepare(
            "SELECT *  FROM chien 
            INNER JOIN utilisateur
            ON chien.user_id = utilisateur.id
            WHERE chien.id = :id"
        );
        $stmt->execute(array('id' => $id));

        $chien = $stmt->fetchObject('Chien');

        return $chien;
    }


    //recuperer les donnés de la base pour le chien
    public function selectAllChien()
    {

        $stmt = $this->connexion->prepare(
            "SELECT *  FROM chien 
            INNER JOIN utilisateur
            ON chien.user_id = utilisateur.id"
        );
        $stmt->execute();

        $chien = $stmt->fetchAll(PDO::FETCH_CLASS, 'Chien');

        return $chien;
    }

    
    //recuperer les donnés dee la base pour l'article
    public function selectAllArticle(int $id)
    {
        
        $stmt = $this->connexion->prepare(
            "SELECT * FROM article 
            INNER JOIN chien
            ON article.id_chien = chien.id
            WHERE chien.id = :id"
        );
        $stmt->execute(array('id' => $id));

        $article = $stmt->fetchAll(PDO::FETCH_CLASS, 'Article');

        return $article;
    }

    public function selectArticleById(int $id)
    {

        $stmt = $this->connexion->prepare(
            "SELECT * FROM article WHERE article.id = :id"
        );
        $stmt->execute(array('id' => $id));

        $article = $stmt->fetchObject('Article');

        return $article;
    }
    //recuperer les donnés dee la base pour les commentaires
    public function selectAllCommentaires(int $id)
    {

        $stmt = $this->connexion->prepare(
            "SELECT *  FROM commentaires 
            INNER JOIN utilisateur
            ON commentaires.user_id = utilisateur.id
            INNER JOIN article
            ON commentaires.id_Article = article.id
            WHERE article.id = :id"
        );
        $stmt->execute(array('id' => $id));

        $resultat = $stmt->fetchAll(PDO::FETCH_CLASS, 'Commentaire');

        return $resultat;
    }

function getOptimalCost($timeTarget)
{ 
    $cost = 9;
    do {
        $cost++;
        $start = microtime(true);
        password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
        $end = microtime(true);
    } while (($end - $start) < $timeTarget);
    
    return $cost;
    }

}  


     
    
    
  //   public function insertHobby($hobby)
  //   {
//         $wellDone = true;

//         try {
//             $stmt = $this->connexion->prepare(
//                 "INSERT INTO Hobby (Type) values (:hobby)"
//             );

//             $stmt->execute(
//                 array('hobby' => "$hobby")
//             );
//         } catch (Exception $e) {

//     public function insertMusique($style)
//     {



//         $stmt = $this->connexion->prepare(
//             "INSERT INTO Musique (Type) values (:style)"
//         );

//         $stmt->execute(
//             array('style' => "$style")
//         );
//     }
//     public function insertPersonne($nom, $prenom, $url_photo, $date_naissance, $status_couple)
//     {


//         $id = null;

//         try {
//             $stmt = $this->connexion->prepare(
//                 "INSERT INTO Personne (Nom, Prenom,URL_Photo,Date_Naissance, Status_couple)
//         VALUES (:nom,:prenom,:url_photo, :date_naissance,:status_couple )"
//             );


//             $stmt->execute(
//                 array('nom' => $nom, 'prenom' => $prenom, 'url_photo' => $url_photo, 'date_naissance' => $date_naissance, 'status_couple' => $status_couple)
//             );

//             $id = $this->connexion->lastInsertId();
//         } catch (Exception $e) {
//             $id = null;
//         }
//         return $id;

//     }

//         //exercice8

//     public function selectAllHobbies()
//     {


//         $stmt = $this->connexion->prepare(
//             "SELECT id, Type FROM Hobby"
//         );
//         $stmt->execute();

//         $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);

//         return $resultat;

//     }



//         //exercice9

//     public function selectAllMusique()
//     {



//         $stmt = $this->connexion->prepare(
//             "SELECT id, Type FROM Musique"
//         );
//         $stmt->execute();

//         $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);

//         return $resultat;

//     }
//        //exercice 10
//     public function selectPersonnes()
//     {

//         $stmt = $this->connexion->prepare("SELECT * FROM Personne ");
//         $stmt->execute();
//         $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);

//         return $resultat;



//     }

//     public function selectPersonneById($id)
//     {


//         $stmt = $this->connexion->prepare(

//             "SELECT * FROM Personne WHERE Id = :id"
//         );

//         $stmt->execute(array("id" => $id));

//         $resultat = $stmt->fetch(PDO::FETCH_OBJ);


//         return $resultat;

//     }  

//     //exercice 11

//     public function selectPersonneByNomPrenomLike($pattern)
//     {



//         $stmt = $this->connexion->prepare(

//             "SELECT * FROM Personne WHERE LOWER (nom) like LOWER (:nom) OR LOWER (Prenom) like LOWER (:prenom)");

//         $stmt->execute(array("nom"=>"%$pattern%", "prenom"=>"%$pattern%"));

//         $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);

//         return $resultat;

//     }

//     // fonction pour avoir la musique affiche 

//     public function selectPersonneByMusique($id)
//     {



//         $stmt = $this->connexion->prepare(

//             "SELECT * FROM Personne WHERE LOWER (nom) like LOWER (:nom) OR LOWER (Prenom) like LOWER (:prenom)");

//         $stmt->execute(array("nom"=>"%$pattern%", "prenom"=>"%$pattern%"));

//         $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);

//         return $resultat;

//     }


//     // exercice 6 ( relation one to many)

//     public function getPersonneHobby($personneId)
//     {
//         $stmt = $this->connexion->prepare(
//             "SELECT Type from Hobby h
//             INNER JOIN RelationHobby rh ON rh.Hobby_Id = h.Id
//             WHERE rh.Personne_Id= :id"
//         );
//         $stmt->execute(array("id" => $personneId));
//         $hobbies = $stmt->fetchAll(PDO::FETCH_OBJ);
//         return $hobbies;
//     }

//     public function getPersonneMusique($personneId)
//     {
//         $stmt = $this->connexion->prepare(
//             "SELECT Type from Musique m
//             INNER JOIN RelationMusique rm ON rm.Musique_Id = m.Id
//             WHERE rm.Personne_Id= :id"
//         );
//         $stmt->execute(array("id" => $personneId));
//         $musique = $stmt->fetchAll(PDO::FETCH_OBJ);

//         return $musique;
//     }
//     public function getRelationPersonneAll($relationId )
//     {
//         $stmt = $this->connexion->prepare(
//              "SELECT * Type from RelationPersonne rp
//               INNER JOIN Personne p ON rp.Relation_Id = p.Id
//               WHERE rp.Personne_Id= :id");



        
//         $stmt->execute(array("id" => $relationId));
//         $relationpersonne = $stmt->fetchAll(PDO::FETCH_OBJ);
//         return $relationpersonne;
//     }

//     public function getRelationPersonne($relationId )
//     {
//         $stmt = $this->connexion->prepare(

//               "SELECT P2.ID, P2.Nom, P2.Prenom, P2.URL_Photo, RP.Type FROM Personne P2, RelationPersonne RP
//               INNER JOIN Personne P1 ON RP.Personne_Id = P1.ID
//               WHERE P1.ID = :id AND Relation_Id=P2.ID");




        
//         $stmt->execute(array("id" => $relationId));
//         $relationpersonne = $stmt->fetchAll(PDO::FETCH_OBJ);
//         return $relationpersonne;
//     }



//     public function insertPersonneHobbies($personneId, $HobbyIds)
//     {


//         $stmt = $this->connexion->prepare(
//             "INSERT INTO RelationHobby (Personne_Id,Hobby_Id)
//             VALUES (:personne_id,:hobby_id)"
//         );

//         // executer la requete pour chaque hobbyId
//         foreach ($HobbyIds as $hobbie) {

//             $stmt->execute(array("personne_id" => $personneId, "hobby_id" => $hobbie));


//         }

//     }

//     public function insertPersonneMusique($personneId, $MusiquesIds)
//     { 


//         $stmt = $this->connexion->prepare(
//             "INSERT INTO RelationMusique (Personne_Id,Musique_Id)
//             VALUES (:personne_id,:musique_id)"
//         );

//         // executer la requete pour chaque musiqueId
//         foreach ($MusiquesIds as $musique) {

//             $stmt->execute(array("personne_id" => $personneId, "musique_id" => $musique));


//         }

//     }

//     public function insertPersonneRelation($personneId, $RelationsIds, $Type)
//     {


//         $stmt = $this->connexion->prepare(
//             "INSERT INTO RelationPersonne (Personne_Id,Relation_Id,Type)
//             VALUES (:personne_id,:relation_id,:type)"
//         );


//         $stmt->execute(array("personne_id" => $personneId, "relation_id" => $RelationsIds, "type" => $Type));



    
              

//     foreach ($_POST[personnes]as $personnes){
//        $applDB->insertPersonneRelation ($id,$personne,$_POST["personne"]);

//     }

?>