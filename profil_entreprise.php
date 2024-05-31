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
    <section class="container-fluid col-lm-4 bg-primary color text-center mt-3">
        <div class="row ">
            <div class=" text-center col-sm-12">
                <form class="bg-primary mt-3 mb-3 text-light rounded-3" action="./scripts/entreprises/modifMailEntr.php" method="post">
                    <label for="mail">Nouveau mail</label>
                    <input type="email" name="mail" id="mail">
                    <button type="submit">Modifier Mail</button>
                </form>
                <form class="bg-primary mb-3 text-light" action="./scripts/entreprises/modifCompteEntr.php" method="post">
                    <label for="nom_gerant"> nom_gerant</label>
                    <input type="text" name="nom_gerant" id="nom_gerant">
                    <button type="submit">Modifier nom du gérant</button>
                </form>
                <form class="bg-primary mb-3 text-light" action="./scripts/entreprises/modifAdresse.php" method="post">
                    <label for="adresse"> Adresse</label>
                    <input type="text" name="adresse" id="adresse">
                    <button type="submit">Modifier adresse </button>
                    </form>
                <form class="bg-primary mb-3 text-light" action="./scripts/entreprises/modifierCodePostal.php" method="post">
                    <label for="code_postal"> Code postal </label>
                    <input type="text" name="code_postal" id="code_postal">
                    <button type="submit">Modifier le code postal </button>
                    </form>
                    <form class="bg-primary mb-3 text-light" action="./scripts/entreprises/modifVille.php" method="post">
                    <label for="ville"> ville </label>
                    <input type="text" name="ville" id="ville">
                    <button type="submit">Modifier la ville </button>
                  </form>
                <form class="bg-primary mb-3 text-light" action="./scripts/entreprises/modifNumeroTel.php" method="post">
                    <label for="numero_tel"> Numero de téléphone </label>
                    <input type="text" name="numero_tel" id="numero_tel">
                    <button type="submit">Modifier Numéro de téléphone </button>
                </form>
                <form class="bg-primary text-light" action="./scripts/entreprises/modifMDPEntr.php" method="post">
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

    <a class="container d-flex justify-content-center btn btn-danger mt-3 " href="./scripts/entreprises/supprCompte_Entr.php">Supprimer mon compte</a>
    </div>
    <?php require('./includes/footer.php')
    ?>
</body>

</html>