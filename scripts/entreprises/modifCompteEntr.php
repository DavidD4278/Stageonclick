<?php
session_start();
require('../../includes/dbConnect.php');
// verification du remplissage des champs
if(!empty($_POST['nom_gerant'])) {
    // sécurisation input utilisateur
    $pseudo = htmlspecialchars($_POST['nom_gerant']);
    // mise à jour pseudo
    $query = $connect->prepare("UPDATE entreprise SET nom_gerant = ? WHERE nom_gerant = ?");
    $query->execute([$pseudo, $_SESSION['nom']]);
    // mise à jour session
    $_SESSION['nom'] = $pseudo;
    // preparation message pour utilisateur
    $_SESSION['error'] = "<p class='text-success'>Le nom du gérant a bien été modifié.</p>";
    // redirection page profil
    header('Location: ../../profil_entreprise.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_entreprise.php');
    exit();
}