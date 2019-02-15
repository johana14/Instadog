<?PHP
require_once 'connexion.php';
$appliBD = new Connexion();

if ($_POST) {

    /*
     * ================================
     * Operations upon form submission.
     * ================================
     */
    if (isset($_POST['register'])) {

        /*
         * =======================
         * Read the posted values.
         * =======================
         */
        if (($_POST['username']) and ($_POST['password']) and ($_POST['password-verify'])) {

            /*
             * ================================
             * Check if passwords are the same.
             * ================================
             */
            if ($_POST['password'] === $_POST['password-verify']) {

                /*
                 * =====================
                 * Check if user exists.
                 * =====================
                 */
                if ($appliBD->getUserinfo($_POST['username']) == null) {

                    /*
                     * ==================
                     * Hash the password.
                     * ==================
                     */
                    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    /*
                     * =====================
                     * Add user to database.
                     * =====================
                     */
                    /*$dateDerniereConnexion = null; // GETDATE();*/
                    $appliBD->insertUser($_POST['username'], $passwordHash);

                    session_start ();
                    $_SESSION['username'] = $userid;
                    $_SESSION['password'] = $hashpassword;
                    header("Location: profil_utilisateur.php?id=$id");


                } else {
                    echo "<span>Ce compte existe déjà! Veuillez-vous connecter!</span><br/>";
                }
        
            } else {
            echo "<span>Les mots de passe ne sont pas identiques.</span><br/>";
            }
        }
       
    }   

    /*
     * ================================
     * Operations upon login connexion.
     * ================================
     */
    if (isset($_POST['signin'])) {

    $user = ($_POST['loginUser']);
    $userpassword = ($_POST['loginPassword']);
    
        /*
         * ============================
         * Get user info from database.
         * ============================
         */
        $username = $appliBD->getUserinfo($user);
        $userid = $username->getId();
        /*
         * ==========================
         * If user exist in database.
         * ==========================
         */

        if ($username) {
            $hashpassword = $username->getMotDePasse();
            
            /*
             * ==========================
             * Verify password for users.
             * ==========================
             */
            if (password_verify($userpassword, $hashpassword)) {

                /*
                * =========================
                * Redirect user to Gallery.
                * =========================
                */
                
                session_start ();
                $_SESSION['user'] = $userid;
		        $_SESSION['password'] = $hashpassword;
                header('Location: profil_utilisateur.php?'.$userid.'');   

            } else {
                echo "Le mot de passe ne correspond pas aux données enregistrées. Veuillez vérifier vos données et réessayer.";
            }

        } else {
            echo "L’username ne correspond pas aux données enregistrées. Veuillez vérifier vos données et réessayer.";
        }
    }
    
}
?>