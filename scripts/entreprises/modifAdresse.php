<?php
session_start();
require('../../includes/dbConnect.php');

// verification du remplissage des champs
if(!empty($_POST['adresse'])) {
    // sécurisation input utilisateur
    $adresse = htmlspecialchars($_POST['adresse']);
    // mise à jour mail
    $query = $connect->prepare("UPDATE entreprise SET adresse = ? WHERE id = ?");
    $query->execute([$adresse, $_SESSION['id']]);
    // mise à jour session
    $_SESSION['adresse'] = $adresse;
    // preparation message pour utilisateur
    $_SESSION['error'] = "<p class='text-success'>L'adresse a bien été modifiée.</p>";
    // redirection page profil
    header('Location: ../../profil_entreprise.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_entreprise.php');
    exit();
}