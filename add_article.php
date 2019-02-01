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
            <a class="nav-link" href="accueil.html">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.html">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container-fluid cover-container text-center d-flex flex-column">
      <div class=" row align-items-center justify-content-center flex-fill mx-auto">
        <form class="col-12" method="POST">
            <h1 class="text-center">Create Post</h1>
          <div class="form-group">
            <label for="title">Titre<span class="require">*</span></label>
            <input type="text" class="form-control" name="title" />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="5" class="form-control" name="description"></textarea>
          </div>
          <div class="form-group text-white">
            <p><span class="require">*</span> - required fields</p>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="telechargement">
            <label class="custom-file-label" for="customFile"></label>
          </div>
          <input type="file" class="custom-file-input" id="customFile">
          

          <div class="form-group col-md-12 mt-1">
            <button type="submit" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
      </div>
  </div>
  <footer class="p-5">
    <div class="container">
      <div class="row align-items-center text-center">
        <div class="col-sm-12 cold-md-12 col-lg-12">
          <p><small>&copy; Bootstrap 2019. All Rights Reserved. <br> Made with <i class="fas fa-search"></i> by <a href="https://realise.com/">Realise</a></p>
        </div>
      </div>
    </footer>
</body>
</html>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>