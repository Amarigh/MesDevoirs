<?php

if (isset($_SESSION['connection'])) {
  if ($_SESSION['connection'] != 1) {
    $_SESSION['connection'] = 0;
  }
} else $_SESSION['connection'] = 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>site web e-commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">



</head>





<body class="goto-here">



  <!-- debut de nav -->


  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Boutique</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php" class="nav-link"><b>Accueil</b></a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Produits </b> </a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="produit.php"><b>Produits</b></a>
              <a class="dropdown-item" href="panier.php"><b>Panier</b></a>

            </div>
          </li>
          <!--<li class="nav-item"><a href="produit.php" class="nav-link"><b>test </b></a></li>-->
          <li class="nav-item"><a href="propos.php" class="nav-link"><b>A Propos</b></a></li>
          <li class="nav-item"><a href="contacte.php" class="nav-link"><b>contacte</b></a></li>

          <?php
          if ($_SESSION['connection'] == 0) {
          ?>


            <li class="nav-item"><a href="login.php" class="nav-link"><b>Se connecter </b></a></li>
            <li class="nav-item"><a href="registre.php" class="nav-link"><b>S'inscrire </b></a></li>

          <?php } ?>
          <li class="nav-item cta cta-colored"><a href="panier.php" class="nav-link"><span class="icon-shopping_cart"></span><b>Panier </b></a></li>

          <?php
          if ($_SESSION['connection'] == 1) { ?>
            <li class="nav-item"><a href="#" class="nav-link"><b>Profil </b></a></li>

            <li class="nav-item"><a href="deconnexion.php" class="nav-link"><b>Se Déconnecter </b></a></li>
          <?php } ?>

        </ul>
      </div>
    </div>

  </nav>

  <br>
  <br>