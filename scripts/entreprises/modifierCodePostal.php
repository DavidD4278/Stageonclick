<?php
session_start();
require('../../includes/dbConnect.php');

// verification du remplissage des champs
if(!empty($_POST['code_postal'])) {
    // sécurisation input utilisateur
    $code_postal = htmlspecialchars($_POST['code_postal']);
    // mise à jour mail
    $query = $connect->prepare("UPDATE entreprise SET code_postal = ? WHERE code_postal = ?");
    $query->execute([$code_postal, $_SESSION['code_postal']]);
    // mise à jour session
    $_SESSION['code_postal'] = $code_postal;
    // preparation message pour utilisateur
    $_SESSION['error'] = "<p class='text-light'>Le code postal a bien été modifié.</p>";
    // redirection page profil
    header('Location: ../../profil_entreprise.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_entreprise.php');
    exit();
}