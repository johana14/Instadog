<?PHP
require_once ('connexion.php');
$appliBD = new Connexion();
$chiens = $appliBD->getAllChien();
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.html">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="text-center mx-auto col-md-8">
        <h1 class="mb-3">I enjoy with my whole heart</h1>
        <p class="lead">I throw myself down among the tall grass by the trickling stream; and, as I lie close to the
          earth, a thousand unknown plants are noticed by me: when I hear the buzz of the little world.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 cool-md-12 col-lg-12">
        <div class="input-group">
          <div class="search-panel">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <span id="search_concept">Filter by</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#contains">Contains</a></li>
              <li><a href="#its_equal">It's equal</a></li>
              <li><a href="#greather_than">Greather than ></a></li>
              <li><a href="#less_than">Less than</a></li>
              <li class="divider"></li>
              <li><a href="#all">Anything</a></li>
            </ul>
          </div>
          <input type="text" class="form-control" name="x" placeholder="Search term...">
          <button class="btn btn-default" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </div>
    <div class="row mt-5">
    <?php
          foreach ($chiens as $chien)
          {
            echo'
      <div class="square col-lg-3 col-sm-12 col-md-3 mx auto">
        <div class="content">
          <img class=" content img-fluid" src="'.$chien->getPhoto().'">
        </div>
      </div>
      ';}?>
    </div>
  </div>
  
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-sm-12 cold-md-12 col-lg-12">
          <p><small>&copy; Bootstrap 2019. All Rights Reserved. <br> Made with <i class="fas fa-search"></i> by <a href="https://realise.com/">Realise</a></small></p>
        </div>
      </div>
    </div>
  
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>