<?PHP
require_once ('connexion.php');
$appliBD = new Connexion();
$monchien = $appliBD->getChienById(($_GET["chien"]));
$articles = $appliBD->selectAllArticle(($_GET["chien"]));
?>
<!DOCTYPE html>
<html>

<head>
  <title>Bootstrap Example Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="style.css" rel="stylesheet">
</head>

<body class="bg-cover">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Insta_Dog</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="accueil.html">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.html">Search</a>
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
    <h1 class="h1-dog text-center mt-5">My Dog</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="addArticle col-md-12"><a class="btn btn-primary float-right" href="add_article.html">Ajouter un
          article</a></div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6"><img class="img-fluid d-block col-lg-12" src="<?php echo $monchien->getPhoto();?>"></div>
      <div class="col-sm-6 col-md-6 col-lg-6" id="details">
        <ul class="list-group">
        <li class="list-group-item-success"><i class="mr-2"></i>Nom d'élevage: <?php echo $monchien->getNomElevage();?></li>
        <li class="list-group-item-info"><i class="mr-2"></i> Surnom : <?php echo $monchien->getsurNom();?></li>
        <li class="list-group-item-success"><i class="mr-2"></i> Date de naissance : <?php echo $monchien->getDateNaissance();?></li>
        <li class="list-group-item-info"><i class="mr-2"></i> Sexe : <?php echo $monchien->getSexe();?></li>
        <li class="list-group-item-success"><i class="mr-2"></i> Race : <?php echo $monchien->getRace();?></li>
        </ul>
        <div class="row mt-3" id="newArticle">
        <h5 class="col-md-12 col-lg-12">Recent Article</h5>
        <?php
          foreach ($articles as $article)      
            echo'
          <div class="media col-lg-4 mt-2">
            <a href="#" class="pull-left">
              <img src="'.$article->getPhoto().'" class="media-photo col-lg-12">
            </a>
          </div>
          <a href=article.php?id='.$article->getId().'>
          <div class="preview-article col-lg-8 text-lg-right mt-2">
            <span class="media-meta text-lg-right">'.$article->getDatePublication().'</span>
            <p class="summary">"'.$article->getTexte().'"</p></a>
          </div>
          ';?>
        </div>  
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>