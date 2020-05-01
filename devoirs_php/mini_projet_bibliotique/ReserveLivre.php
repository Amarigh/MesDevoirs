<?php
include("layout.php");

if (isset($_GET['code'])) {
    $_SESSION['livcode'] = $_GET['code'];
}
include('d_base.php');
$d_base = new d_base();
$bd = null;
$bd = $d_base->init($bd);
$reponse = $bd->prepare("select * from livres where livcode like ?");
$reponse->execute(array($_SESSION['livcode']));
$resulte = $reponse->fetch();

?>
<h2>Réserver un livre</h2>
<p>Vous désirer réserver le livre suivant :</p>

<table border="1">
    <tr>
        <th>CodeLivre</th>
        <th><?php echo $resulte['livcode'] ?></th>
    </tr>
    <tr>
        <th>Nom de l'Auteur</th>
        <th><?php echo $resulte['livnomaut'] ?></th>
    </tr>
    <tr>
        <th>Prénom de l'Auteur</th>
        <th><?php echo $resulte['livprenomaut'] ?></th>
    </tr>
    <tr>
        <th>Titre</th>
        <th><?php echo $resulte['livtitre'] ?></th>
    </tr>
    <tr>
        <th>Catégorie</th>
        <th><?php echo $resulte['livcategorie'] ?></th>
    </tr>
    <tr>
        <th>ISBN</th>
        <th><?php echo $resulte['livISBN'] ?></th>
    </tr>

</table>
<br>
<div>
    <form method="post" action="ReserveLivre.php">
        <input type="submit" value="Confirmer" name="confirmer">
    </form>
</div>

<?php
if (isset($_POST['confirmer'])) {
    $reponsee = $bd->prepare("insert into emprunts values(?,?,?,?)");

    $reponsee->execute(array(date('d-m-Y'), date('d') + 5 . date('-m-Y'), $_SESSION['livcode'], $_SESSION['lecnum']));

    echo "<script>window.location=\"ConfirmReservation.php\"</script>";
}

?>

</body>

</html>