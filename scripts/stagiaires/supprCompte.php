<?php
session_start();
require('../../includes/dbConnect.php');

$query = $connect->prepare("DELETE FROM user WHERE mail = ?");
$query->execute([$_SESSION['mail']]);
header('Location: ../deconnexion.php');
exit();
