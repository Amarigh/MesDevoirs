<?php
session_start();
include("layoutfirst.php");

if (empty($_SESSION['user'])) {
  $_SESSION['user'] = array();
}


include("d_base.php");

if (isset($_POST['inscrire'])) {
  $d_base = new d_base();
  $db = null;
  $db = $d_base->init($db);
  $reponse = $db->prepare("select * from client");
  $reponse->execute();
  $v_user = 0;
}

$i = 1;


?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Accueil</a></span> <span>Registre</span></p>
        <h1 class="mb-0 bread">Inscrivez-vous</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light" id="inscrire">
  <div class="container">



    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form method="post" action="registre.php#inscrire" class="bg-white p-5 contact-form">

          <div class="form-group">
            <div><label for="nom">Nom</label></div>
            <input type="text" name="nom" id="nom" class="form-control" value="<?php
                                                                                if (isset($_POST['inscrire'])) {
                                                                                  echo $_POST['nom'];
                                                                                } ?>" placeholder="votre Nom" />
            <?php
            if (isset($_POST['inscrire'])) {
              if (empty($_POST['nom'])) {
                $i = 0;
            ?>
                <li style="color:red;">nom obligatoir</li>
            <?php }
            } ?>
          </div>



          <div class="form-group">
            <div><label for="prenom">Prenom</label></div>
            <input type="text" name="prenom" id="prenom" class="form-control" value="<?php
                                                                                      if (isset($_POST['inscrire'])) {
                                                                                        echo $_POST['prenom'];
                                                                                      } ?>" placeholder="Votre prenom ">
            <?php
            if (isset($_POST['inscrire'])) {
              if (empty($_POST['prenom'])) {
                $i = 0;
            ?>
                <li style="color:red;">prenom obligatoir</li>
            <?php }
            } ?>
          </div>

          <div class="form-group">
            <div><label for="cni">CNI</label></div>
            <input type="text" name="cni" id="cni" class="form-control" value="<?php
                                                                                if (isset($_POST['inscrire'])) {
                                                                                  echo $_POST['cni'];
                                                                                } ?>" placeholder="votre Nom" />
            <?php
            if (isset($_POST['inscrire'])) {
              if (empty($_POST['cni'])) {
                $i = 0;
            ?>
                <li style="color:red;">cni obligatoir</li>
            <?php }
            } ?>
          </div>

          <div class="form-group">
            <div><label for="email">Email</label></div>
            <input type="text " id="email" name="email" class="form-control" value="<?php
                                                                                    if (isset($_POST['inscrire'])) {
                                                                                      echo $_POST['email'];
                                                                                    } ?>" placeholder="Votre Email">
            <?php
            if (isset($_POST['inscrire'])) {
              if (empty($_POST['email'])) {
                $i = 0;

            ?>
                <li style="color:red;">email obligatoir</li>
                <?php } else {

                if (!preg_match('/.+@.+/', $_POST['email'])) {
                  $i = 0;
                ?>

                  <ol type="squart" style="color:red;">
                    <li>email mal format</li>
                    <ol>
                      <li>email doit confirmer le format ..@...</li>
                    </ol>

              <?php
                }
              }
            }

              ?>
          </div>
          <div class="form-group">
            <div><label for="tel">Tel</label></div>
            <input type="text" id="tel" name="tel" class="form-control" value="<?php
                                                                                if (isset($_POST['inscrire'])) {
                                                                                  echo $_POST['tel'];
                                                                                } ?>" placeholder="votre tel">
            <?php
            if (isset($_POST['inscrire'])) {
              if (empty($_POST['tel'])) {
                $i = 0;
            ?>
                <li style="color:red;">Tel obligatoir</li>

              <?php
              } elseif (!preg_match('/^[+-]?[0-9]+$/', $_POST['tel'])) {
                $i = 0;

              ?>
                <li style="color:red;">Tel mal format</li>
            <?php }
            } ?>
          </div>

          <div class="form-group">
            <div><label for="mpasse">Mote de passe </label></div>
            <input type="password" id="mpasse" name="mpasse" class="form-control" value="<?php
                                                                                          if (isset($_POST['inscrire'])) {
                                                                                            echo $_POST['mpasse'];
                                                                                          } ?>" placeholder="votre mot de passe">
            <?php
            if (isset($_POST['inscrire'])) {
              if (empty($_POST['mpasse'])) {
                $i = 0;
            ?>
                <li style="color: red;">mode de passe obligatoir</li>
              <?php
              } elseif (strlen($_POST['mpasse']) < 8) {
                $i = 0;
              ?>
                <li style="color: red;">mode de passe doit contien au moin 8 caracctères</li>
              <?php
              } else if (!preg_match('/[0-9]/', $_POST['mpasse']) || !preg_match('/[A-Z]/', $_POST['mpasse']) || !preg_match('/[\#@%?$]/', $_POST['mpasse'])) {
                $i = 0;
              ?>

                <ol style="color: red;">mode de passe mal format
                  <ol>Mode de Passe doit contient <li>un nombre [0-9] </li>
                    <li>une lettre en majescul</li>
                    <li>un carractère spécieux [\#@%?$]</li>
                  </ol>
                </ol>
            <?php

              }
            }




            ?>
          </div>

          <div class="form-group">
            <div><label for="cmpasse">Confirmer mot de passe </label></div>
            <input type="password" id="cmpasse" class="form-control" name="cmpasse" placeholder="confirmé votre mot de passe ">
            <?php

            if (isset($_POST['inscrire'])) {
              if (empty($_POST['cmpasse'])) {

                $i = 0;
            ?>
                <li style="color: red;">confirmation de mode de passe obligatoir</li>
              <?php
              } elseif ($_POST['mpasse'] != $_POST['cmpasse']) {
                $i = 0;
              ?>
                <li style="color: red;">les deux mode de passe sont incompatible </li>
            <?php
              }
            }

            ?>
          </div>

          <div class="form-group">
            <input type="submit" value="inscrire" name="inscrire" class="btn btn-primary py-3 px-5">
            <a style="color:red; position: relative;left: 6em;" href="login.php"> <u>Se connecter</u> </a>
          </div>


          <?php
          if (isset($_POST['inscrire'])) {

            if ($i == 1) {
              while ($resulte = $reponse->fetch()) {

                if (strtoupper($resulte['NUM_CLIENT']) == strtoupper($_POST['cni'])) {
                  $v_user = 1;
          ?>

                  <li style="color: red;"> Ce CNI déja existe</li>
                <?php

                  break;
                } elseif (strtoupper($resulte['EMAIL']) == strtoupper($_POST['email'])) {

                  $v_user = 1;

                ?>
                  <li style="color: red;"> Email déja existe</li>
          <?php

                  break;
                }
              }
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
include("layoutlast.php");
?>

<?php

if (isset($_POST['inscrire'])) {
  if ($i == 1 && $v_user == 0) {

    $_SESSION['user'] = array('email' => $_POST['email'], 'mpasse' => $_POST['mpasse']);


    try {
      $reponse = $db->prepare('insert into client values(?,?,?,?,?,?)');
      $reponse->execute(array($_POST['cni'], $_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mpasse'], $_POST['tel']));
    } catch (Exception $e) {
      echo $e->getMessage();
    }



    $_SESSION['num_client'] = $_POST['cin'];
    echo '<script>window.location="login.php"</script>';
  }
}









?>