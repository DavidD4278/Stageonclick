<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img src="./medias/logosoc.png"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-md-flex flex-md-row justify-content-end" id="navbarSupportedContent">
            <?php
            if (empty($_SESSION['id'])) {
            ?>
                <div class="d-flex flex-column flex-md-row">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Se connecter
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./index.php?conn=stg">Stagiaire</a></li>
                                <li><a class="dropdown-item" href="./index.php?conn=ent">Entreprise</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto justify-content-eleven mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                S'inscrire
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="./index.php?inscr=stg">Stagiaire</a></li>
                                <li><a class="dropdown-item" href="./index.php?inscr=ent">Entreprise</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php
            } else {
            ?>
                <div class='d-flex flex-column flex-md-row justify-content-md-around' id='connectedLinks'>
                    <!-- ECHO RACCOURCI CI-DESSOUS -->
                    <p class='mb-md-0'>Bonjour <?= $_SESSION['nom'] ?> !</p>
                    <?php
                    if ($_SESSION['statut'] === "stagiaire") {
                        echo "<p class='mb-md-0'><a href='./profil_stagiaire.php'>Modifier le profil</a></p>";
                    } else {
                        echo "<p class='mb-md-0'><a href='./creation_annonce.php'>Poster une annonce</a></p>";
                        echo "<p class='mb-md-0'><a href='./profil_entreprise.php'>Modifier le profil</a></p>";
                    }
                    ?>
                    <p class='mb-md-0'><a href='./scripts/deconnexion.php'>Déconnexion</a></p>
                </div>


            <?php
            }
            ?>

        </div>
    </div>
</nav>