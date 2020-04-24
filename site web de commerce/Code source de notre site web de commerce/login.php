<?php
session_start();
include("layoutfirst.php");


?>


<?php





if (isset($_POST['connection'])) {

  include("d_base.php");
  $v_champ = 1;
  $d_base = new d_base();
  $db = null;
  $db = $d_base->init($db);
  $reponse = $db->prepare("select * from client");
  $reponse->execute();
  $v_connection = 0;



  while ($resulte = $reponse->fetch()) {
    if (strtoupper($_POST['email']) == strtoupper($resulte['EMAIL'])   &&   $_POST['mpasse'] == $resulte['MODE_PASSE']) {
      $v_connection = 1;
    }
  }
}










?>





















<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Accueil</a></span> <span>Login</span></p>
        <h1 class="mb-0 bread">connectez-vous</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">



    <div class="row block-9">

      <div class="col-md-6 order-md-last d-flex">

        <form action="login.php#login" method="post" class="bg-white p-5 contact-form">
          <div id="login" style="min-height: 8em;"></div>
          <div class="form-group input-group">


            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon2">@</div>
            </div>


            <input type="text" name="email" value="<?php if (!empty($_SESSION['user'])) {
                                                      echo $_SESSION['user']['email'];
                                                    }


                                                    ?>" class="form-control" placeholder="votre email">
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon2"> M?</div>
            </div>
            <input type="password" class="form-control" name="mpasse" value="<?php if (!empty($_SESSION['user'])) {
                                                                                echo $_SESSION['user']['mpasse'];
                                                                              }


                                                                              ?>" placeholder="votre mot de passe ">
          </div>


          <?php

          if (isset($_POST['connection'])) {

            if (empty($_POST['email'])) {
              $v_champ = 0;

          ?>
              <li style="color:red;">email obligatoir</li>
            <?php } elseif (!preg_match('/.+@.+/', $_POST['email'])) {
              $i = 0;
            ?>


              <li style="color:red;">email mal format
                <ol>
                  <li>email doit confirmer le format ..@...</li>
                </ol>
              </li>

            <?php
            }

            if (empty($_POST['mpasse'])) {
              $v_champ = 0;
            ?>
              <li style="color: red;">mode de passe obligatoir</li>
            <?php
            } elseif (strlen($_POST['mpasse']) < 8) {
              $v_champ = 0;
            ?>
              <li style="color: red;">mode de passe doit contien au moin 8 caracctères</li>
            <?php
            } else if (!preg_match('/[0-9]/', $_POST['mpasse']) || !preg_match('/[A-Z]/', $_POST['mpasse']) || !preg_match('/[\#@%?$]/', $_POST['mpasse'])) {
              $v_champ = 0;
            ?>

              <li style="color: red;">mode de passe mal format
                <ol>Mode de Passe doit contient <li>un nombre [0-9] </li>
                  <li>une lettre en majescul</li>
                  <li>un carractère spécieux [\#@%?$]</li>
                </ol>
              </li>
          <?php

            }
          }



          ?>




          <div class="form-group">
            <input type="submit" value="Connection" name="connection" class="btn btn-primary py-3 px-5">
            <a style="color:red; position: relative;left: 6em;" href="registre.php"> <u>S'inscrire</u> </a>
          </div>

          <?php


          if (isset($_POST['connection'])) {

            if ($v_connection == 0 && $v_champ == 1) {

          ?>

              <div>
                <p style="color:red;"> Email et Mot de Passe sont incopatible</p>
              </div>
          <?php
            }
          }

          ?>

        </form>

      </div>


      <div class="col-md-6 d-flex">
        <div class="img_about"></div>
      </div>


    </div>
  </div>
</section>



<?php
if (isset($_POST['connection'])) {


  if ($v_connection == 1 && $v_champ == 1) {



    echo '<script>window.location="connexion.php?email=\"<?php echo $_POST[\'email\'] ?>\""</script>';
  }
}


?>


<?php
include("layoutlast.php");

?>