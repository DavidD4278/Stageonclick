<?php
// obligatoire si on veut utiliser les variables de sessions
session_start();
require('../../includes/dbConnect.php');
if (!empty($_POST['mail']) && !empty($_POST['pass'])) {
    $mail = htmlspecialchars($_POST['mail']);
    // rechercher dans la bdd si l'utilisateur existe dans la BDD
    $query = $connect->prepare("SELECT * FROM entreprise WHERE mail = ?");
    $query->execute([$mail]);
    $entreprise = $query->fetch();
    // si l'utilisateur existe
    if ($entreprise !== false) {
        // on verifie que le mot de passe correspond
        $verif = password_verify($_POST['pass'], $entreprise['pass']);
        // si c'est ok
        if ($verif === true) {
            // on rentre les infos dans $session + retour à l'accueil
            $_SESSION['id'] = $entreprise['id'];
            $_SESSION['mail'] = $entreprise['mail'];
            $_SESSION['nom'] = $entreprise['nom_gerant'];
             $_SESSION['statut'] = "entreprise";
            header('Location: ../../index.php');
            exit();
        } else {
            // erreur MDP
            $_SESSION['error'] = "<p class='text-danger'>le mot de passe ou l'identifiant est incorrect.</p>";
            header('Location: ../../index.php?conn=ent');
            exit();
        }
    } else {
        // erreur utilisateur inexistant
        $_SESSION['error'] = "<p class='text-danger'>le mot de passe ou l'identifiant est incorrect.</p>";
        header('Location: ../../index.php?conn=ent');
        exit();
    }
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Un des champs est vide.</p>";
    header('Location: ../../index.php?conn=ent');
    exit();
}
