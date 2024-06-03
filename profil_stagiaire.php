<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require('includes/headlinks.php') ?>
</head>

<body class="text-align">

    <?php require('./includes/header.php') ?>
    <?php
    // redireaction à la page d'accueil si l'utilisateur n'est pas connecté
    if (empty($_SESSION['id']) || $_SESSION['statut'] !== "stagiaire") {
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
    <<section class="container col-lg-4 bg-primary text-center mx-auto my-5">
    <div class="row">
        <div class="col-12">
            <form class="bg-primary mt-3 mb-3 text-light rounded-3" action="./scripts/stagiaires/modifMail.php" method="post">
                <div class="mb-3 text-start">
                    <label for="mail" class="form-label">Nouveau mail</label>
                    <input type="email" name="mail" id="mail" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier Mail</button>
            </form>
            <form class="bg-primary mb-3 text-light" action="./scripts/stagiaires/modifPseudo.php" method="post">
                <div class="mb-3 text-start">
                    <label for="pseudo" class="form-label">Nouveau pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier Pseudo</button>
            </form>
            <form class="bg-primary text-light" action="./scripts/stagiaires/modifMDP.php" method="post">
                <div class="mb-3 text-start">
                    <label for="oldpass" class="form-label">Actuel mdp</label>
                    <input type="password" name="oldpass" id="oldpass" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="newpass" class="form-label">Nouveau mdp</label>
                    <input type="password" name="newpass" id="newpass" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="newpass2" class="form-label">Confirmation</label>
                    <input type="password" name="newpass2" id="newpass2" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier MDP</button>
            </form>
        </div>
    </div>
</section>


    <a href="./scripts/stagiaires/supprCompte.php">Supprimer mon compte</a>
    <?php require('./includes/footer.php')
    ?>
</body>
</html>