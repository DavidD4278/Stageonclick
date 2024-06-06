<?php
session_start();
require('../../includes/dbConnect.php');

// verification du remplissage des champs
if(!empty($_POST['ville'])) {
    // sécurisation input utilisateur
    $ville = htmlspecialchars($_POST['ville']);
    // mise à jour mail
    $query = $connect->prepare("UPDATE entreprise SET ville  = ? WHERE ville = ?");
    $query->execute([$ville, $_SESSION['ville']]);
    // mise à jour session
    $_SESSION['ville'] = $ville;
    // preparation message pour utilisateur
    $_SESSION['error'] = "<p class='text-success'>La ville  a bien été modifiée.</p>";
    // redirection page profil
    header('Location: ../../profil_entreprise.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_entreprise.php');
    exit();
}
