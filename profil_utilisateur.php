<?PHP
require_once ('connexion.php');
$appliBD = new Connexion();
$user = $appliBD->getUserChien(($_GET["id"]));
session_start();
	if(!isset($_SESSION['user']))
	{
		header("location: accueil.php");
	}
?>

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bare - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this website -->
    <link href="style.css" rel="stylesheet">
</head>

<body class="cover">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="accueil.html">Insta_Dog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="accueil.php">Home <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div class="container-fluid h-100 d-flex flex-column">
        <div class="row align-items-center h-100">
            <div class="col-md-6 col-sm-6 col-lg-6">
                <div class="user-details col-8 mx-auto">
                <div id="profile">
                
            </div>
                    <form role="user-form" method="POST">
                        <div class="form-group">
                            <label class="form-label form-control-label">Username</label>
                            <input class="form-control" type="text" value="<?php echo $user->getNomUtilisateur();?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label form-control-label">Password</label>
                            <input class="form-control" type="password" value="<?php echo $user->getMotDePasse();?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label form-control-label">Confirm password</label>
                            <input class="form-control" type="password" value="<?php echo $user->getMotDePasse();?>">
                        </div>
                        <div class="form-group">
                            <label class="form-label form-control-label"></label>
                            <input type="reset" class="btn btn-primary-profil" value="Cancel">
                            <input type="button" class="btn btn-success-profil" value="Save Changes">
                        </div>
                    </form>
                </div>
            </div>
            <div class="row col-md-6 col-sm-6 col-lg-6">
                <div class="square col-lg-3 col-sm-12 col-md-3 mx auto">
                    <div class="content">
                        <img class=" content img-fluid" src="https://via.placeholder.com/150">
                    </div>
                </div>
            </div>
        </div>  
    </div>  
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>