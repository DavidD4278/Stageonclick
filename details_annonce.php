<?php
session_start();
//on va chercher les données dans la base de données
// on se connecte à la base de données
require('../../includes/dbConnect.php');

// on recherche dans la bdd si les annonces existent dans la bdd
$query= $connect->prepare("SELECT * FROM annonces WHERE id = ? ");
$query-> execute ([$id]);
$annonces = $query -> fetch();
// si l'annonce existe 
if ($annonces !== false) {
// on verifie que les données correspondent à l'annonceur

// on rentre les infos des annonces 




}


// <!DOCTYPE html>
// <html lang="fr">

// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title> StageonClick</title>
//     <?php require('./includes/headlinks.php') ?>
// </head>
// <body>
// <section class=" containier-fluid row justify-content-around  rounded-4 mt-5  ">
//         <div class="card mt-2 mb-2 bg-primary" style="width: 18rem;">
//             <h5> NumériCall</h5>
//             <img src="/medias/entreprises.jpg" class="card-img-top" alt="...">
//             <div class="card-body">
//               <h5 class="card-title text-center">Offre de stage </h5>
//               <p class="card-text">Dans le cadre d'un stage, la société numérik vous propose <br> d'intégrer leur équipe de dev, afin de vous former aux miétiers du codage informatique. Celui aura lien au dates suivantes : du 01/07/2024 au 01/09/2024 </p>
//               <a href="http://localhost/stageonclick/index.php?inscr=stg" class="btn btn-danger"> Cliquez ici pour candidater</a>
//             </div>
//           </div>


// </body>
