<?php
include_once('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();
extract($_POST);
$idP=$_GET['idP'];
// print_r($idP);
// exit();
// Insérer le client
$DateSortir = date("Y-m-d");

// Check if both arrays are set and have the same count
if (
    isset($_POST['IDProduit']) && isset($_POST['quantiteSortir']) && isset($_POST['PrixVent']) &&
    is_array($_POST['IDProduit']) && is_array($_POST['quantiteSortir']) && is_array($_POST['PrixVent'])
) {

    // Insérer dans la table fromsortir avec l'ID du client
    $IDProduitArray = $_POST['IDProduit'];
    $quantiteSortirArray = $_POST['quantiteSortir'];
    $PrixVentArray = $_POST['PrixVent'];

    // Ensure all arrays have the same count
    $count = count($IDProduitArray);
    if ($count == count($quantiteSortirArray) && $count == count($PrixVentArray)) {
        for ($i = 0; $i < $count; $i++) {
            $currentIDProduit = $IDProduitArray[$i];
            $currentQuantiteSortir = $quantiteSortirArray[$i];
            $currentPrixVent = $PrixVentArray[$i];
            /* inserer le mode de sortir */
            $confirmS = $_POST['confirmS'];
            $confirmS = 'sortir';
            // mysqli_query($cnx, "INSERT INTO fromentrer (IDClient,IDProduit,quantiteEntrer,confirmS) VALUES ('$IDClient','$currentIDProduit','$quantiteEntrer','$confirmS')");
            mysqli_query($cnx, "INSERT INTO fromsortir (DateSortir, IDClient, IDProduit, QuantiteSortir, PrixVente,IDPlace,IDEntrerF) VALUES ('$DateSortir', '$IDClient', '$currentIDProduit', '$currentQuantiteSortir', '$currentPrixVent','$idP','$IDEntrer')");
        }
    } else {
        // Handle error - arrays have different counts
        echo "Error: Arrays have different counts.";
    }
}
$IDClient = $_POST['IDClient'];
header("location:http://localhost/nvappe/AfficherEntrer/afficherFE.php");
