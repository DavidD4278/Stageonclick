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
if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['pseudo']) && !empty($_POST['date_naissance']) && !empty($_POST['mail']) && !empty($_POST['numero_tel'])  &&  !empty($_POST['pass']) && !empty($_POST['pass2'])) {
    // vérification correspondance MDP
    if ($_POST['pass'] === $_POST['pass2']) {
        // sécurisation inputs
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $date_naissance = htmlspecialchars($_POST['date_naissance']);
        $mail = htmlspecialchars($_POST['mail']);
        $numero_tel = htmlspecialchars($_POST['numero_tel']);
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        //  verifier si mail ou pseudo existent
        $query = $connect->prepare("SELECT * FROM user WHERE pseudo = ? OR mail = ?");
        $query->execute([$pseudo, $mail]);
        $response = $query->fetch();
        if ($response === false) {
            // inscription de l'utilisateur si le mail ou le pseudo n'existent pas
            // insertion dans la BDD
            $query = $connect->prepare("INSERT INTO user(prenom, nom, pseudo, date_naissance, mail, numero_tel, pass) VALUES(?, ?, ?, ?, ?, ?, ?)");
            $query->execute([$prenom, $nom, $pseudo, $date_naissance, $mail, $numero_tel, $pass]);
            $_SESSION['error'] = "<p class='text-danger'>Incription réussie. Veuillez vous connecter.</p>";
            header('Location: ../../index.php');
            exit();
        } else {
            // erreur si doublon mail ou pseudo
            $_SESSION['error'] = "<p class='text-danger'>Votre mail ou votre pseudo existent déjà.</p>";
            header('Location: ../../index.php');
            exit();
        }
    } else {
        // erreur MDP différents
        $_SESSION['error'] = "<p class='text-danger'>Les mots de passe ne sont pas identiques.</p>";
        header('Location: ../../index.php');
        exit();
    }
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-light'>Un des champs est vide.</p>";
    header('Location: ../../index.php');
    exit();
}
