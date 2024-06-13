<?php
// obligatoire si on veut utiliser les variables de sessions
session_start();
// exemple de debug avec var_dump
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// die;
require('../../includes/dbConnect.php');
// vérification inputs vides
if (!empty($_POST['nom']) && !empty($_POST['domaine']) && !empty($_POST['nom_gerant']) && !empty($_POST['adresse']) && !empty($_POST['code_postal']) && !empty($_POST['ville']) && !empty($_POST['numero_tel']) && !empty($_POST['mail'])  &&  !empty($_POST['pass']) && !empty($_POST['pass2'])) {
    // vérification correspondance MDP
    if ($_POST['pass'] === $_POST['pass2']) {
        // sécurisation inputs
        $nom = htmlspecialchars($_POST['nom']);
        $domaine = htmlspecialchars($_POST['domaine']);
        $nom_gerant = htmlspecialchars($_POST['nom_gerant']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $code_postal = htmlspecialchars($_POST['code_postal']);
        $ville = htmlspecialchars($_POST['ville']);
        $numero_tel = htmlspecialchars($_POST['numero_tel']);
        $mail = htmlspecialchars($_POST['mail']);
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        //  verifier si mail ou pseudo existent
        $query = $connect->prepare("SELECT * FROM entreprise WHERE nom_gerant = ? OR mail = ?");
        $query->execute([$nom_gerant, $pass]);
        $response = $query->fetch();
        if ($response === false) {
            // inscription de l'utilisateur si le mail ou le pseudo n'existent pas
            // insertion dans la BDD
            $query = $connect->prepare("INSERT INTO entreprise(nom, domaine, nom_gerant, adresse, code_postal, ville, numero_tel, mail, pass) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$nom, $domaine, $nom_gerant, $adresse, $code_postal, $ville, $numero_tel, $mail, $pass]);
            $_SESSION['error'] = "<p class='text-white'>Inscription réussie. Veuillez vous connecter.</p>";
            header('Location: ../../index.php');
            exit();
        } else {
            // erreur si doublon mail ou pseudo
            $_SESSION['error'] = "<p class='text-white'>Votre mail ou votre pseudo existent déjà.</p>";
            header('Location: ../../index.php');
            exit();
        }
    } else {
        // erreur MDP différents
        $_SESSION['error'] = "<p class='text-primary'>Les mots de passe ne sont pas identiques.</p>";
        header('Location: ../../index.php');
        exit();
    }
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-light'>Un des champs est vide.</p>";
    header('Location: ../../index.php');
    exit();
}
