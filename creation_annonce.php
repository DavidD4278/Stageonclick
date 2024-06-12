<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> StageonClick</title>
    <?php require('./includes/headlinks.php') ?>
</head>

<body>

    <body class="bg-white">
        <?php require('./includes/header.php') ?>
        <?php
        // redireaction à la page d'accueil si l'utilisateur n'est pas connecté
        if (empty($_SESSION['id']) || $_SESSION['statut'] !== "entreprise") {
            header('Location: ./index.php');
            exit();
        }
        ?>
        <?php
        // affichage d'un message d'erreur stocké dans la session (un des seuls moyens de faire communiquer des fichiers entre eux)
        if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
            // on vide la variable de session pour ne pas causer de conflits entre les messages d'erreur
            $_SESSION['error'] = "";
        }
        ?>
        <?php require('./includes/footer.php') ?>
        <form class="bg-primary mb-3 text-light rounded-3 p-3" action="./scripts/annonces/inserer_annonce.php" method="post">
            <div class="mb-3 text-center">
                <label for="titre" class="form-label"> titre du stage </label>
                <input type="text" name="titre" id="titre" class="form-control">
            </div>
            <!-- <button type="submit" class="btn btn-light">Modifier le code postal</button>           </form> -->

            <div class="mb-3 text-center">
                <label for="description" class="form-label"> Offre de stage (descrption) </label>
                <input type="text" name="description" id="description" class="form-control">
            </div>
            <!-- <button type="submit" class="btn btn-light">Modifier l'offre de stage </button> -->

            <div class="mb-3 text-center">
                <label for="id_entreprise" class="form-label"> Publié par id de l'entreprise </label>
                <input type="text" name="id_entreprise" id="id_entreprise" class="form-control" value="  <?php echo ($_SESSION['id']) ?>">
            </div>
            <button type="submit" class="  text-center btn btn-light"> Valider </button>
        </form>
    </body>

</html>