<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();
    extract($_POST);

    // Check if IDSortir is set
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch all relevant IDs for the client from fromsortir table
        $idQuery = "SELECT IDSortir FROM fromsortir WHERE IDClient = '$IDClient'";
        $idResult = mysqli_query($cnx, $idQuery);

            // Loop through each fetched ID and update the products
            while ($row = mysqli_fetch_assoc($idResult)) {
                $currentIDSortir = $row['IDSortir'];

                // Construct arrays to store update values for each product
                $updateQuantities = [];
                $updatePrices = [];

                foreach ($IDProduit as $key => $produitID) {
                    $quantiteSortirVal = $quantiteSortir[$key];
                    $prixVentVal = $PrixVent[$key];

                    // Add values to arrays
                    $updateQuantities[] = "WHEN IDProduit = $produitID THEN $quantiteSortirVal";
                    $updatePrices[] = "WHEN IDProduit = $produitID THEN $prixVentVal";
                }

                // Construct the SQL query using CASE statements
                $updateQuery = "UPDATE fromsortir 
                                SET QuantiteSortir = CASE " . implode(" ", $updateQuantities) . " END,
                                    PrixVente = CASE " . implode(" ", $updatePrices) . " END
                                WHERE IDSortir = $currentIDSortir";

                // Execute the SQL query
                $result = mysqli_query($cnx, $updateQuery);

                // Check for errors
                if (!$result) {
                    echo "Error updating products for IDSortir=$currentIDSortir: " . mysqli_error($cnx);
                    // Handle error as needed (e.g., log, display, etc.)
                }
            }

            // Redirect or perform additional actions after successful update
             header("location: afficheSortir.php");
        }



