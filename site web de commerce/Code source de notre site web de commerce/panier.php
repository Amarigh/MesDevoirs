<?php
session_start();
include('layoutfirst.php');
?>

<?php


if ($_SESSION['connection'] == 0) {

  echo '<script>window.location="login.php#login"</script>';
}


include("d_base.php");

$d_base = new d_base();
$db = null;
$db = $d_base->init($db);




if (!isset($_POST["envoi"])) $_POST["envoi"] = "";
if (!isset($_SESSION["cart"])) $_SESSION["cart"] = [];



if (isset($_POST["add"])) {
  if (isset($_SESSION["cart"])) {
    $count = count($_SESSION["cart"]);


    $etim_array = array(
      'product_id' => $_GET['id'],
      'item_name' => $_POST['hidden-name'],
      'product_price' => $_POST['hidden-price'],
      'item_quantity' => $_POST['quantity'],

    );
    $_SESSION["cart"][$count] = $etim_array;
    echo '<script>window.location="panier.php"</script>';
  } else {
    $etim_array = array(
      'product_id' => $_GET['id'],
      'item_name' => $_POST['hidden-name'],
      'product_price' => $_POST['hidden-price'],
      'item_quantity' => $_POST['quantity'],

    );
    $_SESSION["cart"][0] = $etim_array;
  }
}

if (isset($_GET["action"])) {
  if ($_GET["action"] == "delete") {
    foreach ($_SESSION["cart"] as $key => $value) {

      if ($value['product_id'] == $_GET['id']) {
        unset($_SESSION["cart"][$key]);
        echo '<script>alert("le product est supprimer  ")</script>';
        echo '<script>window.location="panier.php"</script>';
      }
    }
  }
}

?>


<link rel="stylesheet" type="text/css" href="css/panier.css">
<br>
<div class="container" style="width:70% ;">
  <h2>Panier</h2>
  <div class="row ">

    <?php
    if (!empty($_SESSION['id_produits'])) {


      $table_ = explode('|', $_SESSION['id_produits']);


      foreach ($table_ as $id_) {
        $reponse = $db->prepare('select * from produits where ID=?');
        $reponse->execute(array($id_));
        $done = $reponse->fetch()

    ?>

        <div class="col-md-3">
          <form method="post" action="panier.php?action=add&id=<?php echo $done['ID'] ?>">
            <div class="product">


              <img src="<?php echo ($done['IMAGE']) ?>" class="img img-responsive">
              <h5 class="text-info"> <?php echo $done['NAME'];  ?> </h5>
              <h5 class="text-danger"><?php echo $done['PRIX'] . " \$"; ?> </h5>
              <input type="text" name="quantity" value="1" class="form-control">
              <input type="hidden" name="hidden-name" value="<?php echo ($done['NAME']); ?>">
              <input type="hidden" name="hidden-price" value="<?php echo ($done['PRIX']); ?>">
              <input type="submit" name="add" value="Ajouter" style="margin-top: 5px;" class="btn btn-success">

            </div>
          </form>
        </div>
        <div class="col-md-1"></div>

    <?php
      }
    } ?>
  </div>


  <div style="clear:both;"></div>

  <form method="post" action="panier.php">
    <h2>

      <a href=""><input type="submit" name="envoi" value="Verifier" class="btn btn-primary"></a>
      <a href=""><input type="submit" name="envoi" value="Enregistrer" class="btn btn-primary"></a>

      <a href=""> <input type="submit" name="envoi" value="Logout" class="btn btn-primary"></a>

    </h2>

  </form>

  <?php if (isset($_POST["envoi"]) && $_POST["envoi"] == "Verifier") {
  ?>
    <h3 class="title2">panier detaillé</h3>
    <div class="table-responsive">
      <table class="table table-bordered">
        <tr>
          <th width="30%">nom Produit</th>
          <th width="10%">quantité</th>
          <th width="13%">Prix detail</th>
          <th width="10%">Prix total</th>
          <th width="17%">Remove</th>

        </tr>

        <?php
        if (!empty($_SESSION["cart"])) {
          $total = 0;
          foreach ($_SESSION["cart"] as $key => $value) {

        ?>

            <tr>
              <td> <?php echo $value['item_name'] ?></td>
              <td> <?php echo  $value['item_quantity'] ?></td>
              <td><?php echo $value['product_price']; ?> $</td>
              <td><?php echo number_format($value['item_quantity'] * $value['product_price'], 2); ?> $</td>
              <td><a href="panier.php?action=delete&id=<?php echo $value['product_id']; ?> " class="text-danger">remove etim</a></td>
            </tr>
          <?php
            $total += $value['item_quantity'] * $value['product_price'];
            $prix_total = $total;
          } ?>
          <tr>
            <td colspan="3" align="center">Total</td>
            <th align="center"><?php echo number_format($total, 2); ?> $</th>
            <td></td>
          </tr>

        <?php }
        ?>

      </table>
    </div>
  <?php
  }

  ?>

  <?php

  if (isset($_POST["envoi"]) && $_POST["envoi"] == "Enregistrer") {
    $f = fopen("file.txt", "w");
    if ($f) {
      foreach ($_SESSION["cart"] as  $value) {

        fputs($f, "numero id :" . $value['product_id'] . " ; name_produit: " . $value['item_name'] . " ; nombre de produit: " . $value['item_quantity'] . " ; prix: " . $value['product_price'] . " $ \n");
      }



      fclose($f);
    }

    echo " <h3> les données du panier sont enregistré<h3>";
  }

  ?>
  <?php
  if (isset($_POST['envoi']) && $_POST["envoi"] == "Logout") {
    session_destroy($_SESSION["cart"]);

    echo "<h3>La session est terminée</h3>";
  }

  ?>
</div>


<?php

include('layoutlast.php')
?>