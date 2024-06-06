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
if (!empty($_POST['titre']) && !empty($_POST['description'])  && !empty($_POST['id_entreprise'])) {
        // sécurisation inputs
        $titre = htmlspecialchars($_POST['nom']);
        $description = htmlspecialchars($_POST['description']);
        $id_entreprise = htmlspecialchars($_POST['id_entreprise']);


            // inscription de l'utilisateur si le mail ou le pseudo n'existent pas
            // insertion dans la BDD
            $query = $connect->prepare("INSERT INTO annonces(titre, description, id_entreprise ) VALUES(?, ?, ?)");
            $query->execute([$nom, $description, $id_entreprise]);
            $_SESSION['error'] = "<p class='text-light'>publication réussie.</p>";
            header('Location: ../../index.php');
            exit();

} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-light'>Un des champs est vide.</p>";
    header('Location: ../../index.php');
    exit();
}