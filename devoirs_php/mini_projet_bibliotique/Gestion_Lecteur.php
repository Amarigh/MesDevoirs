<?php

include("layout.php");

include('d_base.php');
$d_base = new d_base();
$bd = null;
$bd = $d_base->init($bd);
$reponse = $bd->prepare("select * from lecteurs");
$reponse->execute();






$lec_existe = 0;
$verification_champs = 1;


?>

<h2>Gestion du lecteur </h2>

<?php
while ($resulte = $reponse->fetch()) {
    if ($_SESSION['lecnom'] == $resulte['lecnom'] && $_SESSION['lecmpasse'] == $resulte['lecmotdepasse']) {

        $lec_existe = 1;
        $_SESSION['lecnum'] = $resulte['lecnum'];


        break;
    }
}




?>

<?php


if ($lec_existe == 0) {

?>

    <p>Le lecteur n'est pas reconnu</p>
    <p>Cliquer <a href="Authentification.php">ici</a> pour tenter une nouvelle identification </p>
    <h3>Enregistrement d'un lecteur</h3>
    <p>Si vous êtes un nouveau lecteur , veuillez vous enregistrer en remplissant le formulaire ci-dessous</p>
    <h2>Enregistrement d'un lecteur </h2>



    <form method="post" action="Gestion_Lecteur.php">




<div class="d1">
   <div class="d"><i>nom</i></div>
   <div><input type="text" name="nom" value="<?php if (isset($_POST['ok'])) echo $_POST['nom'] ?>"></div>

</div>
<?php if (isset($_POST['ok'])) {
   if (empty($_POST['nom'])) {
      $verification_champs = 0;
?>
      <li style="color:red;">nom obligatoir</li>
<?php
   }
}

?>
<br>
<br>
<div class="d1">
   <div class="d"><i>prénom</i></div>
   <div><input type="text" name="prenom" value="<?php if (isset($_POST['ok'])) echo $_POST['prenom'] ?>"></div>
</div>
<?php if (isset($_POST['ok'])) {
   if (empty($_POST['prenom'])) {
      $verification_champs = 0;
?>
      <li style="color:red;">prenom obligatoir</li>
<?php
   }
}

?>
<br>
<br>

<div class="d1">
   <div class="d"><i>mot de passe</i></div>
   <div><input type="password" name="mpasse" value="<?php if (isset($_POST['ok'])) echo $_POST['mpasse'] ?>"></div>
</div>
<?php if (isset($_POST['ok'])) {
   if (empty($_POST['mpasse'])) {
      $verification_champs = 0;
?>
      <li style="color:red;">mode de passe obligatoir</li>
   <?php
   } elseif (strlen($_POST['mpasse']) < 8) {
      $verification_champs = 0;

   ?>
      <li style="color:red;">mode de passe doit contien au moin 8 carractèes </li>
   <?php } else if (!preg_match('/[@$?]/', $_POST['mpasse']) || !preg_match('/[a-zA-Z]/', $_POST['mpasse'])) {
      $verification_champs = 0;
   ?>

      <li style="color:red;">mode de passe doit contien les lettres en muniscul et en majescul et les carractères spécieux @$? </li>
<?php }
}
?>
<br>
<br>

<div class="d1">
   <div class="d"><i>adresse</i></div>
   <div><input type="text" name="adresse" value="<?php if (isset($_POST['ok'])) echo $_POST['adresse'] ?>"></div>
</div>
<?php if (isset($_POST['ok'])) {
   if (empty($_POST['adresse'])) {
      $verification_champs = 0;
?>
      <li style="color:red;">adresse obligatoir</li>
<?php
   }
}

?>
<br>
<br>


<div class="d1">
   <div class="d"><i>ville</i></div>
   <div><input type="text" name="ville" value="<?php if (isset($_POST['ok'])) echo $_POST['ville'] ?>"></div>
</div>
<?php if (isset($_POST['ok'])) {
   if (empty($_POST['ville'])) {
      $verification_champs = 0;
?>
      <li style="color:red;">ville obligatoir</li>
<?php
   }
}

?>
<br>
<br>
<div class="d1">
   <div class="d"><i>code postal</i></div>
   <div><input type="text" name="cpostale" value="<?php if (isset($_POST['ok'])) echo $_POST['cpostale'] ?>"></div>
</div>
<?php if (isset($_POST['ok'])) {

   settype($_POST['cpostale'], "integer");
   if (empty($_POST['cpostale'])) {
      $verification_champs = 0;
?>
      <li style="color:red;">code postale obligatoir</li>
<?php
   }
}
?>



<br>
<br>


<div class="d1"><input type="submit" class="b" value="valider" name="ok">
</div>



</form>
<?php

    
} else {

    $reponse1 = $bd->prepare("select * from livres where livcode not in (select empcodelivre from emprunts where empnumlect like ?) order by livcategorie");
    $reponse1->execute(array($_SESSION['lecnum']));


?>





    <p>Le lecteur n° <span style="color:green;"><?php echo $resulte['lecnum'] ?> </span> est reconnu</p>
    <h3>voici la liste des ouvrage disponibles à la réservation </h3>
    <table border="1">
        <tr>
            <th>CodeLivre</th>
            <th>NomAuteur</th>
            <th>PrenomAuteur</th>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>ISBN</th>
            <th> </th>
        </tr>

        <?php
        while ($resulte1 = $reponse1->fetch()) {
        ?>
            <tr>
                <th><?php echo $resulte1['livcode'] ?></th>
                <th><?php echo $resulte1['livnomaut'] ?></th>
                <th><?php echo $resulte1['livprenomaut'] ?></th>
                <th><?php echo $resulte1['livtitre'] ?></th>
                <th><?php echo $resulte1['livcategorie'] ?></th>
                <th><?php echo $resulte1['livISBN'] ?></th>
                <th><a href="ReserveLivre.php?code=<?php echo $resulte1['livcode'] ?>"><u>réserver</u></a></th>


            </tr>
        <?php } ?>
    </table>
    <h3>Voici la liste de vos réservations</h3>
    <table border="1">
        <tr>
            <th>CodeLivre</th>
            <th>NomAuteur</th>
            <th>PrenomAuteur</th>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>ISBN</th>
        </tr>
        <?php

        $reponse2 = $bd->prepare("select * from livres where livcode  in (select empcodelivre from emprunts where empnumlect like ?) order by livcategorie");
        $reponse2->execute(array($_SESSION['lecnum']));

        while ($resulte2 = $reponse2->fetch()) {
        ?>
            <tr>
                <th><?php echo $resulte2['livcode'] ?></th>
                <th><?php echo $resulte2['livnomaut'] ?></th>
                <th><?php echo $resulte2['livprenomaut'] ?></th>
                <th><?php echo $resulte2['livtitre'] ?></th>
                <th><?php echo $resulte2['livcategorie'] ?></th>
                <th><?php echo $resulte2['livISBN'] ?></th>



            </tr>
        <?php } ?>
    </table>

<?php } ?>

<?php

if (isset($_POST['ok']) && $verification_champs == 1) {
    $reponse3 = $bd->prepare("select lecnum from lecteurs");
    $reponse3->execute();
    $resulte3 = $reponse3->fetchall();
    $n = mt_rand(1000, 1000000);
    while (in_array($n, $resulte3)) {

        $n = mt_rand(1000, 1000000000000000);
    }

    $_SESSION['lecnum'] = $n;
    $_SESSION['lecnom']=$_POST['nom'];
    $_SESSION['lecmpasse']=$_POST['mpasse'];
    $reponse4 = $bd->prepare("insert into lecteurs values(?,?,?,?,?,?,?)");
    $reponse4->execute(array($n, $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['ville'], $_POST['cpostale'], $_POST['mpasse']));

    echo "<script>window.location=\"ValidationLecteur.php?code=$n\"</script>";
}


?>
</body>

</html>