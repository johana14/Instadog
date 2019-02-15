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
  if(isset($_POST['addArticle'])){

    /*
    * =======================
    * Read the posted values.
    * =======================
    */
    $photo = $_FILES["articlephoto"]["name"];
    $texte = $_POST["description"];
    
    /*
    * ===================================
    * processing the image posted values.
    * ===================================
    
    $suffixe = date("YmdHis");
    $uploadedFileName = $_FILES["articlephoto"]["name"];
    $uploadedFile = new SplFileInfo($uploadedFileName);
    $fileExtension = $uploadedFile->getExtension();
    $destinationFolder = $_SERVER['DOCUMENT_ROOT']."/projets/Instadog/";
    $destinationName = "images/img-".$suffixe.".".$fileExtension;
    $imageMoved = move_uploaded_file($_FILES["articlephoto"]["tmp_name"], $destinationFolder.$destinationName);*/

      /*
      * =====================
      * Add Dog to database.
      * =====================
      */
        $appliBD->insertArticle($photo, $texte, $dateDePublication, $id_chien);
        
  }      
}
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
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container-fluid cover-container text-center d-flex">
      <div class="row col-12 align-items-center justify-content-center flex-fill mx-auto">
        <form class="add-article" method="POST" enctype="multipart/form-data">
            <h1 class="text-center">Create Post</h1>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="12" class="form-control" name="description" require></textarea>
          </div>
          <div class="form-group text-white">
            <p><span class="require">*</span> - required fields</p>
          </div>
          <div class="custom-file">
            <label class="custom-file-label" for="customFile"></label>
            <input type="file" class="custom-file-input" id="telechargement" name="articlephoto">
          </div>
          <div class="form-group col-md-12 mt-1">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary" name="addArticle">Create</button>
          </div>
        </form>
      </div>
  </div>
</body>
</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>