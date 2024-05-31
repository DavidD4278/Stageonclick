<?php
// obligatoire si on veut utiliser les variables de sessions
session_start();
require('../../includes/dbConnect.php');

if (!empty($_POST['mail2']) && !empty($_POST['pass3'])) {
    $mail = htmlspecialchars($_POST['mail2']);
    // rechercher dans la bdd si l'utilisateur existe dans la BDD
    $query = $connect->prepare("SELECT * FROM user WHERE mail = ?");
    $query->execute([$mail]);
    $user = $query->fetch();
    // si l'utilisateur existe
    if ($user !== false) {
        // on verifie que le mot de passe correspond
        $verif = password_verify($_POST['pass3'], $user['pass']);
        // si c'est ok
        if ($verif === true) {
            // on rentre les infos dans $session + retour à l'accueil
            $_SESSION['id'] = $user['id'];
            $_SESSION['mail'] = $user['mail'];
            $_SESSION['nom'] = $user['pseudo'];
            $_SESSION['statut'] = "stagiaire";
            header('Location: ../../index.php');
            exit();
        } else {
            // erreur MDP
            $_SESSION['error'] = "<p class='text-white'>le mot de passe ou l'identifiant est  incorrect.</p>";
            header('Location: ../../index.php');
            exit();
        }
    } else {
        // erreur utilisateur inexistant
        $_SESSION['error'] = "<p class='text-danger'>L'identifiant  ou le mot de passe est incorrect.</p>";
        header('Location: ../../index.php');
        exit();
    }
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Un des champs est vide.</p>";
    header('Location: ../../index.php');
    exit();
}
