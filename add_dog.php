<?php
require_once('connexion.php');
$appliBD = new Connexion();
/* session_start();
if(!isset($_SESSION['user']))
{
        header("location: accueil.php");
} */

if($_POST){
  /*
  * ================================
  * Operations upon form submission.
  * ================================
  */
  if(isset($_POST['add'])){

    /*
    * =======================
    * Read the posted values.
    * =======================
    */
    $nomElevage = $_POST["nomElevage"];
    $surNom = $_POST["surNom"];
    $dateNaissance = $_POST["dateNaissance"];
    $sexe = $_POST["sexe"];
    $race = $_POST["race"];
    $photo = $_FILES["photo"]["name"];
    /*
    * ===================================
    * processing the image posted values.
    * ===================================
    */
    $suffixe = date("YmdHis");
    $uploadedFileName = $_FILES["photo"]["name"];
    $uploadedFile = new SplFileInfo($uploadedFileName);
    $fileExtension = $uploadedFile->getExtension();
    $destinationFolder = $_SERVER['DOCUMENT_ROOT']."/projets/Instadog/";
    $destinationName = "images/img-".$suffixe.".".$fileExtension;
    $imageMoved = move_uploaded_file($_FILES["photo"]["tmp_name"], $destinationFolder.$destinationName);

      /*
      * =====================
      * Add Dog to database.
      * =====================
      */
        $appliBD->insertChien($nomElevage , $surNom, $dateNaissance, $sexe,
        $race, $user_id, $destinationName);
      }
  }/*
          $nomChien = $_POST["nomChien"];
          $surnomChien = $_POST["surnomChien"];
          $raceChien = $_POST["raceChien"];
          $poidChien = $_POST["poidChien"];
          $imageChien = $_FILES["imageChien"]["name"];

          $appliBD->updateDogInfo($nomChien, $surnomChien, $destinationName, $raceChien, $poidChien, $idChien);*/

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
            <a class="nav-link" href="accueil.php">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container-fluid cover-container text-center d-flex flex-column">
      <div class="row bg align-items-center justify-content-center flex-fill">
      <form class="add-dog mx-auto" method="POST" enctype="multipart/form-data">
          <h1>Add Dog</h1>
        <div class="form-group col-12">
          <label>Add Dog</label>
          <input type="text" class="form-control" name="nomElevage" placeholder="nameBreeding">
          <small class="form-text text-muted">
            We'll never share your email with anyone else.
          </small> 
        </div>
        <div class="form-group col-12"> 
          <label>Nickname</label> 
          <input type="text" class="form-control" name="surNom" placeholder="Nickname">
        </div>
        <div class="form-group col-12"> 
          <label>Birthday</label> 
          <input type="date" class="form-control" name="dateNaissance" placeholder="Date of birthday">
        </div>
        <div class="form-group col-12"> 
          <label>Breed</label> 
          <input type="text" class="form-control" name="race" placeholder="Name of Breed">
        </div>
        <div class="form-group col-12"> 
          <label>Gender</label>
          <div class="radio">
            <label></label><input class="form-check-input" type="radio" name="sexe" id="legendRadio1" value="male">Male</label>
          </div>
          <div class="radio">
            <label><input class="form-check-input" type="radio" name="sexe" id="legendRadio2" value="female">Female</label>
          </div>
        </div>
        <h2>Add Dog picture</h2>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="photo" id="customFile">
          <label class="custom-file-label" for="customFile"></label>
        </div>
        <button type="submit" class="btn btn-secondary mt-2">Cancel</button>
        <button type="submit" class="btn btn-primary mt-2" name="add">Submit</button>
      </form>
    </div>
  </div>
</body>

</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>