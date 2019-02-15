<?php
require_once('connexion.php');
$appliBD = new Connexion();
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
            <a class="nav-link" href="accueil.php">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php">Search</a>
          </li>
          <li class="nav-item">
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container-fluid cover-container text-center d-flex flex-column">
    <div class="row align-items-center justify-content-center flex-fill">
      <form class="login-form mx-auto" method="POST" action="validation_user.php">
        <h1>LOGIN</h1>
        <div class="form-group col-12">
          <label for="inputuserName">Username</label>
          <input type="text" class="form-control"  id="inputUser" name="loginUser" placeholder="Username">
        </div>
        <div class="form-group col-12">
          <label for="inputPassword">Password</label>
          <input type="password" class="form-control" id="inputPassword" name="loginPassword" placeholder="Password">
        </div>
        <div class="checkbox col-12">
          <label><input type="checkbox"> Remember me</label>
        </div>
        <div class="col-lg-12 text-center mt-4 mb-2">
          <button type="submit" class="btn btn-success" name="signin">login</button>
        </div>
      </form>
    </div>
  </div>
  
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>