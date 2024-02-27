<?php
require_once 'C:/laragon/www/NVAPPE/utils/utils.class.php';

// Récupérer l'IDClient de la requête
$IDClient = $_GET['IDClient'];

// Supprimer tous les enregistrements associés à cet IDClient
Utils::supprimer('fromSortir', 'IDClient', $IDClient);

// Rediriger vers la page d'affichage
header("Location: http://localhost/nvappe/afficheSortir/afficheSortir.php");
exit();
