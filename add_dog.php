<?PHP
require_once ('connexion.php');
$appliBD = new Connexion();

$data = (!empty($_GET["chien"]))? $_GET["chien"]:1; 
$chieenid = $appliBD->getChienById(intval($data));

// Si il y a un envoi de données
if($_POST) {
  $appliBD->inscription_chien();
}
// Si il n'y a pas d'utilisateur ou si il y une lettre alors page 404
/*if($chien == null && $_GET["chien"] != int) {
  header("location:accueil.php");
}*/
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Navbar Tutorial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this website -->
  <link href="style.css" rel="stylesheet">
</head>

<body class="bg-cover">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="accueil.html">Insta_Dog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="accueil.html">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.html">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container-fluid cover-container text-center d-flex flex-column">
      <div class="row bg align-items-center justify-content-center flex-fill">
      <form class="mx-auto" action="profil_chien.php" method="POST">
          <h1>Add Dog</h1>
        <div class="form-group col-12">
          <label>Add Dog</label>
          <input type="text" class="form-control" name="nomelevage" placeholder="nameBreeding">
          <small class="form-text text-muted">
            We'll never share your email with anyone else.
          </small> 
        </div>
        <div class="form-group col-12"> 
          <label>Nickname</label> 
          <input type="text" class="form-control" name="surnom" placeholder="Nickname">
        </div>
        <div class="form-group col-12"> 
          <label>Birthday</label> 
          <input type="date" class="form-control" name="datenaissance" placeholder="Date of birthday">
        </div>
        <div class="form-group col-12"> 
          <label>Breed</label> 
          <input type="text" class="form-control" name="race" placeholder="Name of Breed">
        </div>
        <div class="form-group col-12"> 
          <label>Gender</label>
          <div class="radio">
            <label></label><input class="form-check-input" type="radio" name="sexe" id="legendRadio1" value="1">Male</label>
          </div>
          <div class="radio">
            <label><input class="form-check-input" type="radio" name="sexe" id="legendRadio2" value="2">Female</label>
          </div>
        </div>
        <h2>Add Dog picture</h2>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="photo" id="customFile">
          <label class="custom-file-label" for="customFile"></label>
        </div>
        <button type="submit" class="btn btn-secondary mt-2">Cancel</button>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
      </form>
    </div>
  </div>
  <footer class="p-5">
    <p><small>&copy; Bootstrap 2019. All Rights Reserved. <br> Made with <i class="fas fa-search"></i> by <a href="https://realise.com/">Realise</a></small></p>
  </footer>
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>