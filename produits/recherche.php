<?php
// Connexion à la base de données (assurez-vous de remplacer les valeurs par les vôtres)
include_once "../utils/utils.class.php";

// Récupérer le terme de recherche depuis la requête GET
$searchQuery = isset($_GET['searche']) ? $_GET['searche'] : '';

// Effectuer la recherche dans la base de données
if (!empty($searchQuery)) {
    // Exemple : Recherchez dans la table "produits" où le nom du produit contient le terme de recherche
    $sql = "SELECT * FROM produits WHERE NomProduit LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
    $results = $result->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats
    foreach ($results as $result) {
        echo "ID: " . $result['IDProduit'] . " - Nom: " . $result['NomProduit'] . " - Description: " . $result['DescriptionProduit'] . " - Type: " . $result['Type'] . "<br>";
    }
} else {
    echo "Veuillez saisir un terme de recherche.";
}
?>
