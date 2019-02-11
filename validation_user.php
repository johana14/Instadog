<?PHP
require_once('connexion.php');
$appliBD = new Connexion();

// SI L'UTILISATEUR A APPUYÉ SUR LE BOUTON INSCRIPTION
if (isset($_POST['register'])) {
  // SI IL N'A PAS DE CHAMPS VIDES
  if (!empty($_POST['username']) and !empty($_POST['password']) and !empty($_POST['password-verify'])) {
      // SI LES MOTS DE PASSE SONT IDENTIQUES
      if ($_POST['password'] === $_POST['password-verify']) {
          // SI L'UTILISATEUR N'EST PAS DÉJÀ INSCRIT
          if ($appliBD->getUsersByusername($_POST['username']) == false) {
              // HASHER LE PASSWORD
              $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
              // On l'ajoute dans la base de données
              $dateDernierConnexion = null ; // GETDATE();
              $appliBD->insertUser($_POST['username'], $passwordHash, $dateDernierConnexion);
              header("Location: profil_utilisateur.php");
          } else {
              echo "<span>Ce compte existe déjà! Veuillez-vous connecter!</span><br/>";
          }
      } else {
          echo "<span>Les mots de passe ne sont pas identiques.</span><br/>";
      }
  } else {
      echo "<span>Veuillez remplir tous les champs obligatoires.</span><br/>";
  }
} else {
    header("Location: signup.php");
}

// SE CONNECTER A LA BASE DE DONNEES
$userProfile = $appliBD->getUsersByusername($_POST['username']);
// SI L'UTILISATEUR A APPUYÉ SUR LE BOUTON INSCRIPTION
if (isset($_POST['login'])) {
    // SI IL N'A PAS DE CHAMPS VIDES
    if (!empty($_POST['username']) and !empty($_POST['password'])) {
        // SI L'UTILISATEUR N'EST PAS INSCRIT OU QUE LE MOT DE PASSE EST FAUX
        if (($appliBD->getUsersByusername($_POST['username']) !== false) ) {
           if (password_verify($_POST['password'], $userProfile->getMotDePasse())) {
                header("Location: gallery.php");
           }
           else {
                echo "L’username et/ou le mot de passe ne correspondent pas aux données enregistrées. Veuillez vérifier vos données et réessayer.";
           }
        } else {
                echo "L’username et/ou le mot de passe ne correspondent pas aux données enregistrées. Veuillez vérifier vos données et réessayer.";
        }

    } else {
        echo "<span>Veuillez remplir tous les champs obligatoires.</span><br/>";
    }

    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
$login_valide = ($_POST['username']);
$pwd_valide = ($_POST['password']);

// on teste si nos variables sont définies
if (isset($_POST['username']) && isset($_POST['password'])) {

	// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
	if ($login_valide == $_POST['username'] && $pwd_valide == $_POST['password']) {
		// dans ce cas, tout est ok, on peut démarrer notre session

		// on la démarre :)
		session_start ();
		// on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];

		// on redirige notre visiteur vers une page de notre section membre
		header ('location: gallery.php');
	}
	else {
		// Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
		echo '<body onLoad="alert(\'Membre non reconnu...\')">';
		// puis on le redirige vers la page d'accueil
		echo '<meta http-equiv="refresh" content="0;URL=login.php">';
	}
}
else {
	echo 'Les variables du formulaire ne sont pas déclarées.';
}
}

?>
