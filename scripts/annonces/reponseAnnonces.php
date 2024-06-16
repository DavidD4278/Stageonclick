<?php
session_start();
require('../../includes/dbConnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $annonceId = $_POST['annonce_id'];
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $candidature = htmlspecialchars($_POST['candidature']);


    $stmt = $connect->prepare("INSERT INTO candidatures (annonce_id, nom, email, candidature) VALUES (?, ?, ?)");
    $stmt->execute([$annonceId, $nom, $email, $lettre_motivation]);

    header("Location: merci.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse à l'annonce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
    <div class="container mt-5">
        <h2 class="text-center">Répondre à l'annonce</h2>
        <form action="reponseAnnonces.php" method="POST">
            <input type="hidden" name="annonce_id" value="<?php echo $_GET['id']; ?>
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="motivation" class="form-label"> Candidature </label>
                <textarea class="form-control" id="Candidature" name="candidature" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</body>
</html>
