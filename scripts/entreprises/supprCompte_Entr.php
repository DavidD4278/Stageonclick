<?php
session_start();
require('../../includes/dbConnect.php');
$query = $connect->prepare("DELETE FROM entreprise WHERE mail = ?");
$query->execute([$_SESSION['mail']]);
header('Location: ../deconnexion.php');
exit();