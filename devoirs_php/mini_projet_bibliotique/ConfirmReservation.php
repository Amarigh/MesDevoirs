<?php
include("layout.php");
include('d_base.php');
$d_base = new d_base();
$bd = null;
$bd = $d_base->init($bd);
$reponse = $bd->prepare("select * from emprunts where empcodelivre like ? and empnumlect like ?");
$reponse->execute(array($_SESSION['livcode'], $_SESSION['lecnum']));
$resulte = $reponse->fetch();

?>
<h2>Confirmation de votre réservation</h2>
<p>votre reservation est confirmé sous le numéro <?php echo $_SESSION['livcode'] ?></p>
<table>
    <tr>
        <td>
            <label for="DateRese">
                Date de réservation
            </label>
        </td>
        <td style="color:darkgreen">
            <?php echo $resulte['empdate'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="DateRetour">
                Date du retour
            </label>
        </td>
        <td style="color:darkred">
            <?php echo $resulte['empdateret'] ?>
        </td>
    </tr>

</table>
<p>vous pouez retourner à la liste de réservation des livres en cliquant <a href="Gestion_Lecteur.php">ici</a></p>
</body>

</html>