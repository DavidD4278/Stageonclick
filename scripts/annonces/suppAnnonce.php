<?php
session_start();
require('../../includes/dbConnect.php');
$query = $connect->prepare("DELETE FROM description_poste WHERE id_entreprise = ?");
$query->execute([$_SESSION['id_entreprise']]);
header('Location: ../modifierAnnonce.php');
exit();