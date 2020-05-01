<?php
include("layout.php");
include('d_base.php');
$d_base = new d_base();
$bd = null;
$bd = $d_base->init($bd);
$reponse = $bd->prepare("select * from lecteurs where lecnum like ?");
$reponse->execute(array($_GET['code']));
$resulte = $reponse->fetch();

?>
<h2>Validation d'un lecteur </h2>
<style type="text/css">
    li {
        list-style-type: none;
        color: green;
    }
</style>
<table>
    <tr>
        <td>
            <label for="Nom">
                Nom
            </label>
        </td>
        <td>
            <li><?php echo $resulte['lecnom'] ?> </li>
        </td>
    </tr>
    <tr>
        <td>
            <label for="Prenom">
                Prénom
            </label>
        </td>
        <td>
            <li> <?php echo $resulte['lecprenom'] ?></li>
        </td>
    </tr>
    <tr>
        <td>
            <label for="Adresse">
                Adresse
            </label>
        </td>
        <td>
            <li><?php echo  $resulte['lecadresse'] ?></li>
        </td>
    </tr>
    <tr>
        <td>
            <label for="Ville">
                Ville
            </label>
        </td>
        <td>
            <li> <?php echo $resulte['lecville'] ?></li>
        </td>
    </tr>
    <tr>
        <td>
            <label for="Code_Postal">
                Code Postal
            </label>
        </td>
        <td>
            <li> <?php echo $resulte['leccodepostal'] ?></li>
        </td>
    </tr>

    <tr>
        <td>
            <label>
                Numéro
            </label>
        </td>
        <td>
            <li> <?php echo $resulte['lecnum'] ?></li>
        </td>
    </tr>

</table>

<p>vous êtes en regestré dans la base de bibliotique </p>
<p>vous avez maintenant la possibilité de réserver de livres ou vous <a href="Authentification.php"> identifiant ici</a></p>
</body>

</html>