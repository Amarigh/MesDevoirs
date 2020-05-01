<?php
include("layout.php")
?>
<h2>Authentification du lecteur </h2>

<form action="Authentification.php" method="post">

    <div class="d1">

        <div class="d"><i>Nom du lecteur </i></div>

        <div><input type="text" name="lecnom" value="<?php if(isset($_POST['login'])) echo $_POST['lecnom']; else echo $_SESSION['lecnom'] ?>"></div>
    </div>

    <br>
    <br>

    <div class="d1">

        <div class="d"><i>Mot de passe </i></div>

        <div><input type="password" name="lecmpasse" value="<?php if(isset($_POST['login'])) echo $_POST['lecmpasse'];else echo $_SESSION['lecmpasse'] ?>"></div>
    </div>
    <br>
    <br>
    <div class="d">
        <input type="submit" value="Login" name="login">
    </div>
    <?php

    if (isset($_POST['login'])) {
        if (empty($_POST['lecnom'])) {



    ?>
            <li style="color:red;">nom obligatoir</li>
        <?php
        } elseif (empty($_POST['lecmpasse'])) {

        ?>
            <li style="color:red;">login obligatoir</li>
    <?php

        } else {

            $_SESSION['lecnom'] = $_POST['lecnom'];

            $_SESSION['lecmpasse'] = $_POST['lecmpasse'];
            echo "<script>window.location=\"Gestion_Lecteur.php\"</script>";
        }
    }

    ?>

</form>
</body>

</html>