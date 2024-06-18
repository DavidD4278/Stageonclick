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

<body class="body1">
    
    <?php require('./includes/header.php') ?>
    <?php
    // affichage d'un message d'erreur stocké dans la session (un des seuls moyens de faire communiquer des fichiers entre eux)
    if (!empty($_SESSION['error'])) {
        echo $_SESSION['error'];
        // on vide la variable de session pour ne pas causer de conflits entre les messages d'erreur
        $_SESSION['error'] = "";
    }
    ?>
    <?php
    if (!empty($_GET['inscr']) && $_GET['inscr'] && $_GET['inscr'] === "stg" && empty($_SESSION['id'])) {
    ?>

        <form class=" bg-primary text-center text-white  d-flex flex-column justify-content-center" action="./scripts/stagiaires/inscription.php" method="POST">
            <h2>Inscription Stagiaires</h2>
            <div class="mt-3 ">
                <label for="prenom">Prénom </label>
                <input type="text" name="prenom" id="prenom">
            </div>
            <div class="mt-3">
                <label for=""> Nom </label>
                <input type="text" name="nom" id="nom">
            </div>
            <div class="mt-3">
                <label for="pseudo"> Pseudo </label>
                <input type="text" name="pseudo" id="pseudo">
            </div>
            <div class="mt-3">
                <label for="date_naissance"> Date de naissance </label>
                <input type="date" name="date_naissance" id="date_naissance">
            </div>
            <div class="mt-3">
                <label for="mail">Mail</label>
                <input type="mail" name="mail" id="mail">
            </div>
            <div class="mt-3">
                <label for="numero_tel"> numéro de tel </label>
                <input type="text" name="numero_tel" id="numero_tel">
            </div>
            <div class="mt-3">
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass">
            </div>
            <div class="mt-3">
                <label for="pass2">Confirmation mot de passe</label>
                <input type="password" name="pass2" id="pass2">
            </div> <br>
            <a href="profil.php"> se connecter</a>
            <button class="mt-3 " type="submit">Valider</button>
        </form>
    <?php } ?>
    <?php
    if (!empty($_GET['conn']) && $_GET['conn'] === "stg" && empty($_SESSION['id'])) {
    ?>
        <form class=" bg-primary text-center mx-5" action="./scripts/stagiaires/connexion.php" method="POST">
            <h2>Connexion Stagiaires</h2>
            <div>
                <label for="mail2">Mail</label>
                <input type="email" id="mail2" name="mail2">
            </div>
            <br>
            <div>
                <label for="pass3">Mot de passe</label>
                <input type="password" id="pass3" name="pass3">
            </div>
            <button class="mb-3" type="submit">Valider</button>
        </form>
    <?php } ?>
    <?php
    if (!empty($_GET['inscr']) && $_GET['inscr'] === "ent" && empty($_SESSION['id'])) {
    ?>
        <form class="bg-primary text-center " action="./scripts/entreprises/inscription_entreprise.php" method="POST">
            <h2>Inscription Entreprises</h2>
            <div class="mt-3">
                <label for="nom"> Nom </label>
                <input type="text" name="nom" id="nom">
            </div>
            <div class="mt-3">
                <label for=""> Activité </label>
                <input type="text" name="domaine" id="domaine">
            </div>
            <div class="mt-3">
                <label for="nom_gerant"> Nom du gérant </label>
                <input type="text" name="nom_gerant" id="nom_gerant">
            </div>
            <div class="mt-3">
                <label for="adresse"> adresse </label>
                <input type="text" name="adresse" id="adresse">
            </div>
            <div class="mt-3">
                <label for="code_postal"> Code postal </label>
                <input type="text" name="code_postal" id="code_postal">
            </div>
            <div class="mt-3">
                <label for="ville"> Ville </label>
                <input type="text" name="ville" id="ville">
            </div>
            <div class="mt-3">
                <label for="numero_tel"> numéro de tel </label>
                <input type="text" name="numero_tel" id="numero_tel">
            </div>
            <div class="mt-3">
                <label for="mail">Mail</label>
                <input type="text" name="mail" id="mail2">
            </div>
            <div class="mt-3">
                <label for="pass">Mot de passe</label>
                <input type="password" name="pass" id="pass">
            </div>
            <div class="mt-3">
                <label for="pass2">Confirmation mot de passe</label>
                <input type="password" name="pass2" id="pass2">
            </div>
            <button class="mt-3" type="submit">Valider</button>
        </form>
    <?php } ?>
    <?php
    if (!empty($_GET['conn']) && $_GET['conn'] === "ent" && empty($_SESSION['id'])) {
    ?>
        <form class=" bg-primary-subtle text-center mx-5" action="./scripts/entreprises/connexion_entreprise.php" method="POST">
            <h2>Connexion Entreprises</h2>
            <div>
                <label for="mail"> Mail entreprise </label>
                <input type="mail" id="mail3" name="mail">
            </div>
            <br>
            <div>
                <label for="pass3">Mot de passe</label>
                <input type="password" id="pass3" name="pass">
            </div>

            <button class="mb-3" type="submit">Valider</button>
        </form>
    <?php } ?>
    <?php require('./includes/footer.php') ?>
</body>

</html>