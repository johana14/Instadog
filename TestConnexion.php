
<?php

require 'connexion.php';
$appliDB = new Connexion();

//tester que la creation de l'objet connexion se fait bien et qu'il y pas d'erreur
/* if ($appliDB->getConnexion() !=null){
   echo "succes";
    } else {
      echo "echoue";
    } */

      //tester le Select Utilisateur Instadog
     /*$result = $appliDB->selectAllUtilisateur(1);
     var_dump($result)["utilisateur"];*/
      
     //afficher les infos du chien
     /*$result = $appliDB->selectAllChien(1);
     var_dump($result)["1"];*/
      
     //tester et afficher les données dans l'article
     /*$result = $appliDB->selectAllArticle(1);
     var_dump($result)["1"];*/

     /*$result = $appliDB->selectArticleById(1);
     var_dump($result)["1"];*/
     
     //tester et afficher les infos des commentaires
     /*$result = $appliDB->selectAllCommentaires(2);
     var_dump($result)["2"];*/

     /*$result = $appliDB->selectAllImages(1);
     var_dump($result)["1"];*/

     /*$result = $appliDB->getChienById(1);
     var_dump($result)["1"];*/



    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     // if(is_null($result)) {
    //     echo 'Connection échouée';
    // }else{
    //     echo 'Connection réussiefaite';
    // }



    //  insertHobby ("Musique");

    // $appliDB->insertMusique ("Hip-Hop");

    // $wellDone = $appliDB->insertHobby("theatre");
    //  $wellDone = $appliDB->insertHobby("cinema");
    //  $wellDone = $appliDB->insertHobby("vélo");

    // if ($wellDone){

    //      echo 'well done'; 
    //  }
    //  else {
    //      echo 'recommence';
    //  }
    
    // $donnesperso = $appliDB->insertPersonne( "Robert","Diane", "photoDiane", "1981-10-29","Celibataire" );
    //  if ($donnesperso){

    //     echo ' welle done';
    // } else{
    //     echo 'recommence';
    // } 
        
    
//  echo "<ul>";
//      foreach ($result as $Utilisateur){
//          echo "<li>".$Utilisateur->Type."</li>";
//      }
//  echo "</ul>";




        
// $result= $appliDB->selectAllMusique();
// echo"Musique";
//     foreach ($result as $musique){
//         echo '<input type="checkbox">'.$musique->Type."</input><br/>";
//     }

// function displayPersonne($personne){
//     $str =   $personne->Nom." "
//             .$personne->Prenom." "
//             .$personne->URL_Photo." "
//             .$personne->Date_Naissance." "
//             .$personne->Status_couple;
//     echo $str;
// }g
  
// $result=$appliDB->selectPersonneById(1);
   
//  displayPersonne($result);


// $personnes =$appliDB-> selectPersonneByNomPrenomLike("dia");

// //echo $personnes[0]->Prenom;
// var_dump($personnes);


// $PersonneHobby = $appliBD->getPersonneHobby(1);

//     echo  "<ul>";
//     foreach ($personneHobby as $hobbies) {

//         echo "<li>". $hobbies->Type. "</li></br>";

//     }

//  $PersonneMusique = $appliDB->getPersonneMusique(1);
 
//     echo "<ul>";
//     foreach ($PersonneMusique as $musique){

//      echo "<li>" . $musique->Type . "</li></br>";

//     }

//      echo "</ul>";

//   echo "</br>"
  
$appliDB->insertPersonne("jayax","digital2018");
/*var_dump($hash);*/


/*
 * Ce code va tester votre serveur pour déterminer quel serait le meilleur "cost".
 * Vous souhaitez définir le "cost" le plus élevé possible sans trop ralentir votre serveur.
 * 8-10 est une bonne base, mais une valeur plus élevée est aussi un bon choix à partir
 * du moment où votre serveur est suffisament rapide ! Le code suivant espère un temps
 * ≤ à 50 millisecondes, ce qui est une bonne base pour les systèmes gérants les identifications
 * intéractivement.
 *
$timeTarget = 0.05; // 50 millisecondes

$cost = 8;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Valeur de 'cost' la plus appropriée : " . $cost;*/


// $appliDB->insertPersonne( "Robert","Maurice", "photoMaurice", "1971-03-28","Marié" );

// $appliDB->insertPersonne( "Dimario","Stephan", "photoStephan", "1981-12-12","Celibataire" );

// $appliDB->insertPersonne( "Bears","Rudy", "photoRudy", "1979-07-20","Fiancé" );

// $appliDB->insertPersonne( "Summer","Roxana", "photoRoxana", "1981-04-20","Celibataire" );
    
// $appliDB->insertMusique( "jazz");
// $appliDB->insertMusique( "rap");
// $appliDB->insertMusique("opera");
// $appliDB->insertMusique("indie");  
// $appliDB->insertMusique("pop"); 


//  $Personne = $appliDB->getRelationPersonne(1);
//        echo "<ul>";
//       foreach ($Personne as $Personne){

//        echo "<li>". $Personne->Type . "</li></br>";

//      }

//        echo "</ul>";

//     echo "</br>"
//    $PersonneMusique = $appliDB->getPersonneMusique(1);
 
//         echo "<ul>";
//         foreach ($PersonneMusique as $musique){
   
//          echo "<li>" . $musique->Type . "</li></br>";
   
//         }
   
//          echo "</ul>";
   
//    echo "</br>"

// $personnes = $appliDB->getRelationPersonne(1);

// echo "<ul>";


// foreach ($personnes as $personne) {
//     echo "<li>" . $personne->Nom ." ".$personne->Prenom. " est son/sa " . $personne->Type . "</li>";
// }

  // $appliDB->insertPersonneHobbies(58,array(70,71,73));

//  $appliDB->insertPersonneHobbies(8,array(70,71,73));

 //$appliDB->insertPersonneMusique(58,array(4,6,8,44));
    // $appliDB->insertPersonneMusique(10,array(42,43,44));
    // $appliDB->insertPersonneMusique(12,array(8,44,4));
    // $appliDB->insertPersonneMusique(13,array(6,8,44,43));

  // $appliDB->insertPersonneRelation(58,32,"amis");

  // $appliDB->insertPersonneRelation(1, 10,"papa");
  // $appliDB->insertPersonneRelation(1, 11,"fiancé");
  // $appliDB->insertPersonneRelation(1, 13,"amis");

//inserer Musique avec une boucle foreach
// $musique=["hip-hop","rap","opera","jazz","indie"];
// foreach($musique as $mus){
//     $appliBD->insertMUSIQUE($mus);
// }

 
// ?>
 


        