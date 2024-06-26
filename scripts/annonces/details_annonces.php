<?php
session_start();
require('../../includes/dbConnect.php');
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <script defer src="script.js"></script>
  </head>
  <body class="bg-detail_annonces">
    <header class="bg-primary text-white text-center py-2   border border-4 p-3 rounded-top-5 ms-4 me-5 mt-4 ">
      <div>
        <h1 class=" text-warning ">
          Stage Wordpress du 08/07/2024 au 04/10/2024 Chez (id_entreprise)
        </h1>
      </div>
    </header>
    <main class="container my-4">
      <section class="row bg-primary border border-4 p-3 rounded-top-5 rounded-bottom-5">
        <div class="col-md-6 mb-3 mb-md-0">
          <img class="img-fluid rounded-top-3 rounded-bottom-3 border border-3 border border-white" src="/medias/groupetravail.jpg" alt="Stagiaires" 
        </div>
        <div class="col-md-6">
          <p class="border border-5  p-3 text-white rounded-top-3 rounded-bottom-3 ">
            Notre entreprise vous propose, dans le cadre d'un stage sur
            Worpdress, de rejoindre notre équipe de developpeur-web. Ce stage
            vous permettra de mieux vous famiariser avec le CMS. Cette première expérience vous permettra ainsi de mieux comprendre les avantages et les limites d'un cms comme Worpdress.
            Pour postuler, il vous suffit de vous inscrire en tant que stagiaires.
          </p>
          <p class="border border-4 text-white  p-3 rounded-top-2 rounded-bottom-2">
            Ce stage est à pourvoir du 08 juillet 2024 au 04 octobre 2024!. <br> 
          </p>
          <p class="border border-4 text-white  p-3">
            <br> 
          </p>

          <p class=" text-white text-center  p-3">
           
        </div>
      
      </section>
      <div class="bg-primary text-white text-center  py-2 rounded-bottom-5 ms-5 me-5">
        <a href="http://localhost/stageonclick/index.php?inscr=stg"class="btn btn-warning mt-2"> Cliquez ici pour vous inscrire</a>  
      </p>

      </div>
    </main>
    <footer></footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
