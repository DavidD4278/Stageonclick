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
    <section class="container-fluid col-lm-6 -subtile color-light ">
        <div class="row">
            <div class="col-sm-6">
                <form class="bg-primary mb-3 text-light" action="./scripts/stagiaires/modifMail.php" method="post">
                    <label for="mail">Nouveau mail</label>
                    <input type="email" name="mail" id="mail">
                    <button type="submit">Modifier Mail</button>
                </form>
                <form class="bg-primary mb-3 text-light" action="./scripts/stagiaires/modifPseudo.php" method="post">
                    <label for="pseudo">Nouveau pseudo</label>
                    <input type="text" name="pseudo" id="pseudo">
                    <button type="submit">Modifier Pseudo</button>
                </form>
                <form class="bg-primary text-light" action="./scripts/stagiaires/modifMDP.php" method="post">
                    <label for="oldpass">Actuel mdp</label>
                    <input type="password" name="oldpass" id="oldpass">
                    <label for="newpass">Nouveau mdp</label>
                    <input type="password" name="newpass" id="newpass">
                    <label for="newpass2">Confirmation</label>
                    <input type="password" name="newpass2" id="newpass2">
                    <button type="submit">Modifier MDP</button>
                </form>
            </div>
        </div>
    </section>
    <a href="./scripts/stagiaires/supprCompte.php">Supprimer mon compte</a>
    <?php require('./includes/footer.php')
    ?>
</body>
</html>