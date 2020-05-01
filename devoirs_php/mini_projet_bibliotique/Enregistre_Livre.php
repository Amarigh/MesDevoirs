<?php
include('layout.php');
?>
<?php
//un tableau qui va contenir les erreurs
$errors = ['NomAuteur' => '', 'PrenomAuteur' => '', 'Titre' => '', 'ISBN' => ''];

//vérification d'appui sur le boutton submit 
if (isset($_POST['submit'])) {
    //vérification de nom de l'auteur (vide ou non)
    if (empty($_POST['NomAuteur'])) {
        $errors['NomAuteur'] = "le nom de l'auteur est obligatoire !";
    } else {
        $NomAuteur = $_POST['NomAuteur'];
        if (!preg_match('/^[a-zA-Z]+$/', $NomAuteur)) {
            $errors['NomAuteur'] = "le nom de l'auteur doit contenir justement des lettres ! !!!";
        }
    }

    //vérification de Prenom de l'auteur (vide ou non)
    if (empty($_POST['PrenomAuteur'])) {
        $errors['PrenomAuteur'] = "le Prenom de l'auteur est obligatoire !";
    } else {
        $PrenomAuteur = $_POST['PrenomAuteur'];
        if (!preg_match('/^[a-zA-Z]+$/', $PrenomAuteur)) {
            $errors['PrenomAuteur'] = "le Prenom de l'auteur doit contenir justement des lettres ! !!!";
        }
    }

    //vérification de Prenom de l'auteur (vide ou non)
    if (empty($_POST['Titre'])) {
        $errors['Titre'] = "le titre est obligatoire !";
    } else {
        $Titre = $_POST['Titre'];
    }

    //vérification de Prenom de l'auteur (vide ou non)
    if (empty($_POST['ISBN'])) {
        $errors['ISBN'] = "le numéro ISBN est obligatoire !!! ";
    } else {
        $ISBN = $_POST['ISBN'];
        if (!preg_match('/^[0-9]+$/', $ISBN)) {
            $errors['ISBN'] = "le numéro ISBN doit contenir la premiére lettre du nom d'auteur et ce lui de son prénom suivi des nombres!";
        }
    }
}
?>
<form method="POST" action="Enregistre_Livre.php">
    <div class="container">

        <div class="form-row">

            <div class="form-group col-md-4">
                <label for="NomAuteur">NomAuteur</label>
                <input type="text" class="form-control" name="NomAuteur" value="<?php if (isset($_POST['submit'])) {
                                                                                    echo htmlspecialchars($_POST['NomAuteur']);
                                                                                } ?>">
                <?php if (isset($_POST['submit'])) {
                    if (!($errors['NomAuteur'] == "")) {
                        echo '<div class="alert alert-danger" role="alert">' . $errors['NomAuteur'] . '</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">' . 'le nom de l\'auteur est correct !' . '</div>';
                    }
                } ?>
            </div>

            <div class="form-group col-md-4">
                <label for="PrenomAuteur">PrenomAuteur</label>
                <input type="text" class="form-control" name="PrenomAuteur" value="<?php if (isset($_POST['submit'])) {
                                                                                        echo htmlspecialchars($_POST['PrenomAuteur']);
                                                                                    } ?>">
                <?php if (isset($_POST['submit'])) {
                    if (!($errors['PrenomAuteur'] == "")) {
                        echo '<div class="alert alert-danger" role="alert">' . $errors['PrenomAuteur'] . '</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">' . 'le prenom de l\'auteur est correct !' . '</div>';
                    }
                } ?>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="Titre">Titre</label>
                <input type="text" class="form-control" name="Titre" value="<?php if (isset($_POST['submit'])) {
                                                                                echo htmlspecialchars($_POST['Titre']);
                                                                            } ?>">
                <?php if (isset($_POST['submit'])) {
                    if (!($errors['Titre'] == "")) {
                        echo '<div class="alert alert-danger" role="alert">' . $errors['Titre'] . '</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">' . 'le titre du livre est correct !' . '</div>';
                    }
                } ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="ISBN"> Numéro ISBN</label>
                <input type="text" class="form-control" name="ISBN" value="<?php if (isset($_POST['submit'])) {
                                                                                echo htmlspecialchars($_POST['ISBN']);
                                                                            } ?>">
                <?php if (isset($_POST['submit'])) {
                    if (!($errors['ISBN'] == "")) {
                        echo '<div class="alert alert-danger" role="alert">' . $errors['ISBN'] . '</div>';
                    } else {
                        echo '<div class="alert alert-success" role="alert">' . 'le numéro ISBN est correct !' . '</div>';
                    }
                } ?>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="Categorie">Categorie</label>
                <select id="inputState" class="form-control" name="Categorie">
                    <option <?php if (isset($_POST['submit'])) {
                                if ($_POST['Categorie'] == 'Roman') {
                                    echo 'selected="selected"';
                                }
                            } ?>> Roman </option>
                    <option <?php if (isset($_POST['submit'])) {
                                if ($_POST['Categorie'] == 'Science-fiction') {
                                    echo 'selected="selected"';
                                }
                            } ?>>Science-fiction </option>
                    <option <?php if (isset($_POST['submit'])) {
                                if ($_POST['Categorie'] == 'Policier') {
                                    echo 'selected="selected"';
                                }
                            } ?>> Policier </option>
                    <option <?php if (isset($_POST['submit'])) {
                                if ($_POST['Categorie'] == 'Nouvelle') {
                                    echo 'selected="selected"';
                                }
                            } ?>> Nouvelle </option>
                    <option <?php if (isset($_POST['submit'])) {
                                if ($_POST['Categorie'] == 'Histoire') {
                                    echo 'selected="selected"';
                                }
                            } ?>> Histoire </option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <button type="submit" value="Enregistrer" name="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>

    </div>
</form>

<?php
include('d_base.php');
$d_base = new d_base();
$db = null;
$db = $d_base->init($db);

if (isset($_POST['submit'])) {
    if (($errors['ISBN'] == "") && ($errors['NomAuteur'] == "") && ($errors['PrenomAuteur'] == "")) {
        try {
            $reponse = $db->prepare('insert into livres values(?,?,?,?,?,?,?)');
            $N = substr($_POST['ISBN'], strlen($_POST['ISBN']) - 2, strlen($_POST['ISBN']));
            $P = substr($_POST['NomAuteur'], 0, 2);
            $A = substr($_POST['PrenomAuteur'], 0, 2);
            $C = substr($_POST['Categorie'], 0, 2);
            $str = $P . $A . $C . $N;
            $livdejareserve = false;
            $reponse->execute(array($str, $_POST['NomAuteur'], $_POST['PrenomAuteur'], $_POST['Titre'], $_POST['Categorie'], $_POST['ISBN'], $livdejareserve));
            $_SESSION['livcode'] = $str;

            echo "<script>window.location=\"ValidationLivre.php\"</script>";
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
?>

</body>
</htlm>