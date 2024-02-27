<?php
include_once('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();

// Récupérer les informations du client
$IDClient = isset($_GET['IDClient']) ? $_GET['IDClient'] : '';
$re = mysqli_query($cnx, "SELECT * FROM clients WHERE IDClient = '$IDClient'");
$row = $re->fetch_object();

// Récupérer tous les produits avec les quantités entrées liées au client
$query = "SELECT produits.*, SUM(fromentrer.QuantiteEntrer) AS quantiteEntrer
          FROM produits
          LEFT JOIN fromentrer ON produits.IDProduit = fromentrer.IDProduit
          WHERE fromentrer.IDClient = '$IDClient'
          GROUP BY produits.IDProduit";

$rep = mysqli_query($cnx, $query);

if (!$rep) {
    die('Erreur dans la requête SQL : ' . mysqli_error($cnx));
}

$produits = array();
while ($p = $rep->fetch_object()) {
    $produits[] = $p;
}

// Récupérer l'IDEntrer après la récupération des produits
$IDEntrer = isset($_GET['IDEntrer']) ? $_GET['IDEntrer'] : '';


?>
