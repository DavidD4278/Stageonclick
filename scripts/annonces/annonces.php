<?php
session_start();
require('../../includes/dbConnect.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
   <script defer src="script.js"></script>
</head>

<body>
    <header>
<h1 class=" container-fluid bg-primary text-center text-light rounded-3"> ANNONCES </h1>

    </header>
    <main>
        <h1 class=" text-center "> LES OFFRES DE STAGES SUR LE BASSIN DE THAU DANS LE DEVELOPPEMENT WEB </h1>
<section class=" containier-fluid row justify-content-around  rounded-4 mt-5  ">
<?php
         $recupAnn = $connect->prepare('SELECT * FROM annonces');
         $recupAnn->execute();
         $recupAnn = $recupAnn->fetchAll();
         ?>


         <?php
         if (count($recupAnn) > 0) {

            for ($i = 0; count($recupAnn) > $i; $i++) {

               $id = $recupAnn[$i]['id'];
               // echo($id);

               echo '
              <div class="card mt-2 mb-2 bg-primary" style="width: 18rem;">
            <h5> numericlick34</h5>
            <img src="/medias/entreprises.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Offre de stage </h5>
              <p class="card-text">  ' . $recupAnn[$i]['description_poste']. '</p>;
              <a href="http://127.0.0.1:5500/scripts/annonces/details_annonces.html" class="btn btn-danger"> Cliquer pour plus de détails et vous postuler</a>
            </div>
          </div>';
            }
         }
         ?>
        <!-- <div class="card mt-2 mb-2 bg-primary" style="width: 18rem;">
            <h5> numericlick34</h5>
            <img src="/medias/entreprises.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title text-center">Offre de stage </h5>
              <p class="card-text">Dans le cadre d'un stage, la société numériclick34 vous propose <br> d'intégrer leur équipe de developpeur-web, afin de vous former aux métier du codage informatique. Celui aura lien au dates suivantes : du 01/07/2024 au 01/09/2024 </p>
              <a href="http://127.0.0.1:5500/scripts/annonces/details_annonces.html" class="btn btn-danger"> Cliquer pour plus de détails et vous postuler</a>
            </div>
          </div> -->
      
        </section>
        

    </main>

    <footer>



    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>


</html>