<?PHP
require_once ('connexion.php');
$appliBD = new Connexion();
$articles = $appliBD->selectArticleById(($_GET["id"]));
$commentaires = $appliBD->selectAllCommentaires(($_GET["id"]));
?>
<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Navbar Tutorial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bare - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Custom styles for this website -->
  <link href="style.css" rel="stylesheet">
</head>

<body class="body-change">
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
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">
    <div class="row align-items-center justify-content-center flex-fill">
      <!-- Post Content Column -->
      <div class="col-lg-12">
        <hr>
        <!-- Date/Time -->
        <p>Posted on <?php echo $articles->getDatePublication();?></p>
        <hr>
        <!-- Preview Image -->
        <div class="row">
          <div class="col-md-4 col-sm-4"><img class="img-fluid mx-auto d-block" src="<?php echo $articles->getPhoto();?>" alt=""></div>
          <div class="col-md-8 col-sm-8">
            <p class="lead"><?php echo $articles->getTexte();?></p>
          </div>
        </div>
        <hr>
        <!-- Post Content -->
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form>
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
        <!-- Single Comment -->
        <?php
          foreach ($commentaires as $commentaire)
          {
            echo'
        <div class="media mb-4">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5><p>'.$commentaire->getTexteCommentaire().'</p>
          </div>
        </div>
        ';}?>
    </div>
  </div>
  <footer class="p-5">
      <div class="container">
        <div class="row align-items-center text-center">
          <div class="col-sm-12 cold-md-12 col-lg-12">
            <p><small>&copy; Bootstrap 2019. All Rights Reserved. <br> Made with <i class="fas fa-search"></i> by <a href="https://realise.com/">Realise</a></small></p>
          </div>
        </div>
      </div>
    </footer>
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>