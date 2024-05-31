<?php
session_start();
require('../../includes/dbConnect.php');

// verification du remplissage des champs
if (!empty($_POST['pseudo'])) {
    // sécurisation input utilisateur
    $pseudo = htmlspecialchars($_POST['pseudo']);
    // mise à jour pseudo
    $query = $connect->prepare("UPDATE user SET pseudo = ? WHERE pseudo = ?");
    $query->execute([$pseudo, $_SESSION['nom']]);
    // mise à jour session
    $_SESSION['nom'] = $pseudo;
    // preparation message pour utilisateur
    $_SESSION['error'] = "<p class='text-success'>Le pseudo a bien été modifié.</p>";
    // redirection page profil
    header('Location: ../../profil_stagiaire.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_stagiaire.php');
    exit();
}
