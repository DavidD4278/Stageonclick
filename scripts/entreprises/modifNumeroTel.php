<?php
session_start();
require('../../includes/dbConnect.php');

// verification du remplissage des champs
if(!empty($_POST['numero_tel'])) {
    // sécurisation input utilisateur
    $numero_tel = htmlspecialchars($_POST['numero_tel']);
    // mise à jour mail
    $query = $connect->prepare("UPDATE entreprise SET numero_tel = ? WHERE numero_tel = ?");
    $query->execute([$numero_tel, $_SESSION['numero_tel']]);
    // mise à jour session
    $_SESSION['numero_tel'] = $numero_tel;
    // preparation message pour utilisateur
    $_SESSION['error'] = "<p class='text-success'>Le numero de téléphone a bien été modifié.</p>";
    // redirection page profil
    header('Location: ../../profil_entreprise.php');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-danger'>Le champ est vide.</p>";
    header('Location: ../../profil_entreprise.php');
    exit();
}