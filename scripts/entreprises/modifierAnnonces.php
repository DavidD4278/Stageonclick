<?php
session_start();
require('../../includes/dbConnect.php');

// verification du remplissage des champs
if(!empty($_POST['description_poste'])) {
    // sécurisation input utilisateur
    $description_poste = htmlspecialchars($_POST['description_poste']);
    // mise à jour description_poste
    $query = $connect->prepare("UPDATE annonces SET description_poste  = ? WHERE id_entreprise = ?");
    $query->execute([$description_poste, $_SESSION['description_poste']]);
    // mise à jour annonces 
    $_SESSION['description_poste'] = $description_poste;
    // preparation message pour l'entreprise
    $_SESSION['error'] = "<p class='text-success'>L'annonce a bien été modifiée.</p>";
    // redirection page profil
    header('Location: ../../profil_entreprise.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_entreprise.php');
    exit();
}
