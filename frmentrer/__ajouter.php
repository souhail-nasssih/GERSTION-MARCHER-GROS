<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx=connecter();
extract($_POST);
// print_r($_POST);
// exit();
// Insérer le client
mysqli_query($cnx, "INSERT INTO clients (nomClient, adresseClient, N_identif ,tel) VALUES ('$nomClient', '$adresseClient', '$N_identif','$tel')");

// Récupérer l'ID du client ajouté
$idclient_P = mysqli_insert_id($cnx);

// Vérifier si idproduit et quantiteEntrer sont des tableaux
if (is_array($idproduit) && is_array($quantiteEntrer) && count($idproduit) == count($quantiteEntrer)) {
    // Insérer dans la table fromentrer avec l'ID du client
    for ($i = 0; $i < count($idproduit); $i++) {
        $idProduit = $idproduit[$i];
        $quantite = $quantiteEntrer[$i];
        $dateEntrer = date("Y-m-d");
        mysqli_query($cnx, "INSERT INTO fromentrer (dateEntrer, idclient, idProduit, quantiteEntrer,IDPlace) VALUES ('$dateEntrer', '$idclient_P', '$idProduit', '$quantite','$idPlace' )");
    }
}

// Fermer la connexion
mysqli_close($cnx);
header("location:http://localhost/nvappe/frmentrer/formulaire.php");
?>
