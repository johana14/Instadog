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
                    $dateDerniereConnexion = null; // GETDATE();
                    $appliBD->insertUser($_POST['username'], $passwordHash, $dateDerniereConnexion);

                    session_start();

                    echo 'Bienvenue à la page numéro 1';

                    $_SESSION['username'] = 'username';
                    $_SESSION['password']   = 'password';
                    $_SESSION['id']     = 'id';

                    // Fonctionne si le cookie a été accepté
                    echo '<br /><a href="page2.php">page 2</a>';

                    // Ou bien, en indiquant explicitement l'identfiant de session
                    echo '<br /><a href="page2.php?' . SID . '">page 2</a>';


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

    $username = ($_POST['loginUser']);
    $userpassword = ($_POST['loginPassword']);

        /*
         * ============================
         * Get user info from database.
         * ============================
         */
        $username = $appliBD->getUserinfo($username);

        /*
         * ==========================
         * If user exist in database.
         * ==========================
         */

        if ($username) {
            $hashpassword = $username->getMotDePasse();
            $userid = $username->getId();

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
                header("Location: gallery.php");

            } else {
                echo "L’username et/ou le mot de passe ne correspondent pas aux données enregistrées. Veuillez vérifier vos données et réessayer.";
            }

        } else {
            echo "L’username ne correspond pas aux données enregistrées. Veuillez vérifier vos données et réessayer.";
        }
    }
    
}
?>