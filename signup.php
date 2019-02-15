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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top mx-auto">
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
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container-fluid cover-container text-center d-flex flex-column">
      <div class="row bg align-items-center justify-content-center flex-fill">
      <form class="signup-form mx-auto" action="validation_user.php" method="POST">
        <h1>SIGNUP</h1>
        <div class="form-group col-12">
          <label class="inputuserName">Username</label>
          <input type="text" class="form-control" name="username" id="inputUser" placeholder="Username">
        </div>
        <div class="form-group col-12">
          <label class="inputPassword">Password</label>
          <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
        </div>
        <div class="form-group col-12">
          <label class="inputPassword">Confirm Password</label>
          <input type="password" class="form-control" name="password-verify" id="inputPassword" placeholder="Password">
        </div>
        <div class="col-lg-12 text-center mt-4 mb-2">
          <button type="reset" class="btn btn-primary btn-cancel"><a href="accueil.php">Cancel</button></a>
          <button type="submit" class="btn btn-success" name="register">Register</button>
        </div>
      </form>
    </div>
    </div>  
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
