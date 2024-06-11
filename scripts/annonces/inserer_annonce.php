<?php
// obligatoire si on veut utiliser les variables de sessions
session_start();
require('../../includes/dbConnect.php');
if (!empty($_POST['titre']) && !empty($_POST['description'])  && !empty($_POST['id_entreprise'])) {
    // sécurisation inputs
    $titre = htmlspecialchars($_POST['titre']);
   

    $description_poste = htmlspecialchars($_POST['description']);   

    $id_entreprise = htmlspecialchars($_POST['id_entreprise']);
   

    // inscription de l'utilisateur si le mail ou le pseudo n'existent pas
    // insertion dans la BDD
    $query = $connect->prepare("INSERT INTO annonces(titre, description_poste, id_entreprise ) VALUES(?, ?, ?)");
    $query->execute([$titre, $description_poste, $id_entreprise]);
    $_SESSION['error'] = "<p class='text-light'>publication réussie.</p>";
     header('Location: ./annonces.html');
    exit();
} else {
    // erreur champ vide
    $_SESSION['error'] = "<p class='text-light'>Un des champs est vide.</p>";
    header('Location: ../../index.php');
    exit();
}
