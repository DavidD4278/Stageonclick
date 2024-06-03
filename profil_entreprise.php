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
<section class="container col-lg-4 bg-primary text-center mx-auto my-5 rounded-top-5 rounded-bottom-5">
    <div class="row">
        <div class="col-12">
            <form class="bg-primary mt-3 mb-3 text-light rounded-3 p-3" action="./scripts/entreprises/modifMailEntr.php" method="post">
                <div class="mb-3 text-start">
                    <label for="mail" class="form-label">Nouveau mail</label>
                    <input type="email" name="mail" id="mail" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier Mail</button>
            </form>
            <form class="bg-primary mb-3 text-light p-3" action="./scripts/entreprises/modifCompteEntr.php" method="post">
                <div class="mb-3 text-start">
                    <label for="nom_gerant" class="form-label">Nom du gérant</label>
                    <input type="text" name="nom_gerant" id="nom_gerant" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier nom du gérant</button>
            </form>
            <form class="bg-primary mb-3 text-light p-3" action="./scripts/entreprises/modifAdresse.php" method="post">
                <div class="mb-3 text-start">
                    <label for="adresse" class="form-label">Adresse</label>
                    <input type="text" name="adresse" id="adresse" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier adresse</button>
            </form>
            <form class="bg-primary mb-3 text-light p-3" action="./scripts/entreprises/modifierCodePostal.php" method="post">
                <div class="mb-3 text-start">
                    <label for="code_postal" class="form-label">Code postal</label>
                    <input type="text" name="code_postal" id="code_postal" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier le code postal</button>
            </form>
            <form class="bg-primary mb-3 text-light p-3" action="./scripts/entreprises/modifVille.php" method="post">
                <div class="mb-3 text-start">
                    <label for="ville" class="form-label">Ville</label>
                    <input type="text" name="ville" id="ville" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier la ville</button>
            </form>
            <form class="bg-primary mb-3 text-light p-3" action="./scripts/entreprises/modifNumeroTel.php" method="post">
                <div class="mb-3 text-start">
                    <label for="numero_tel" class="form-label">Numéro de téléphone</label>
                    <input type="text" name="numero_tel" id="numero_tel" class="form-control">
                </div>
                <button type="submit" class="btn btn-light">Modifier Numéro de téléphone</button>
            </form>
            <form class="bg-primary text-light p-3" action="./scripts/entreprises/modifMDPEntr.php" method="post">
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


    <a class="container d-flex justify-content-center btn btn-dark mb-3 mt-3 " href="./scripts/entreprises/supprCompte_Entr.php">Supprimer mon compte</a>
    </div>
    <?php require('./includes/footer.php')
    ?>
</body>

</html>