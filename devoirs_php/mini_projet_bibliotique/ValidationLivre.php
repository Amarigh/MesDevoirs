<?php
include("layout.php");
include('d_base.php');
$d_base = new d_base();
$bd = null;
$bd = $d_base->init($bd);
$reponse = $bd->prepare("select * from livres where livcode like ? ");
$reponse->execute(array($_SESSION['livcode']));
$resulte = $reponse->fetch();
?>
<h2>Validation d'un livre </h2>
<table>
    <tr>
        <td>
            <label for="NomAuteur">
                Nom de l'auteur
            </label>
        </td>
        <td>
            :<?php echo  $resulte['livnomaut'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="PrenomAuteur">
                Prénom de l'auteur
            </label>
        </td>
        <td>
            :<?php echo  $resulte['livprenomaut'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="Titre">
                Titre
            </label>
        </td>
        <td>
            :<?php echo  $resulte['livtitre'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="Categorie">
                Catégorie
            </label>
        </td>
        <td>
            :<?php echo  $resulte['livcategorie'] ?>
        </td>
    </tr>
    <tr>
        <td>
            <label>
                Numéro ISBN
            </label>
        </td>
        <td>
            :<?php echo  $resulte['livISBN'] ?>
        </td>
    </tr>
</table>

</body>

</html>