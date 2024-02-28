<?php
// Connexion à la base de données (utilisation de mysqli_connect)

require('C:/laragon/www/NVAPPE/connection/__connection.php');
$connexion = connecter();

// Vérification de la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Requête pour récupérer les produits depuis la base de données
$sql = "SELECT idproduit, nomproduit FROM produits order by nomproduit asc";
$resultat = mysqli_query($connexion, $sql);

// Stockage des données dans un tableau PHP
$produits = [];
while ($row = mysqli_fetch_assoc($resultat)) {
    $produits[] = $row;
}
$place = "SELECT IDPlace, NomPlace FROM places WHERE EtatPlace = 'Disponible'";
$EtaPlace = mysqli_query($connexion, $place);

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
<!-- readonly="readonly" -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire d'Entrée</title>
    <?php
    include_once(__DIR__ . '/../inc/header.php');
    //  include_once (__DIR__ .'/../s/Menu/header.php'); 


    ?>
</head>

<body>
<header>
        <?php
        require_once '../menu/__menu.php';
        include_once(__DIR__ . '/../inc/sidebar.php');
        // include_once ('../s/Menu/navigation.php'); 

        ?>
    </header>
    <div class="container mt-5">
        <h2>Formulaire d'Entrée</h2>
        <form action="__ajouter.php" method="post" autocomplete="off">
            <!-- Informations sur le client -->
            <div class="mb-3">
                <label for="nomClient" class="form-label">Nom du Client</label>
                <input type="text" class="form-control" id="nomClient" name="nomClient" required>
            </div>
            <div class="mb-3">
                <label for="adresseClient" class="form-label">Adresse du Client</label>
                <input type="text" class="form-control" id="adresseClient" name="adresseClient" required>
            </div>
            <div class="mb-3">
                <label for="autresInfosClient" class="form-label">N°Carte de Client</label>
                <input type="text" class="form-control" id="autresInfosClient" name="N_identif">
            </div>   <div class="mb-3">
                <label for="autresInfosClient" class="form-label">Tel Client</label>
                <input type="text" class="form-control" id="autresInfosClient" name="tel">
            </div>
            <div class="mb-3 w-auto">
                <!-- <label for="idPlace" class="form-label">Place</label> -->
                <select class="form-select" id="idPlace" name="idPlace" required>
                    <option value="">Sélectionner une place</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($EtaPlace)) {
                        echo '<option value="' . $row['IDPlace'] . '">' . $row['NomPlace'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="col d-flex justify-content-center h-100 align-content-center">
                <button type="button" class="btn btn-success mb-4  " onclick="ajouterProduit()">Ajouter Produit</button>
            </div>

            <div class="">
                <div class="produits d-flex gap-3 align-items-center">
                    <table class="table table-striped">
                        <thead class="table-dark opacity-75">
                            <tr>
                                <th>Produit</th>
                                <th>Quantité Entrée (Kg)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <div class="mb-3 w-auto">
                                    <!-- <label for="produitID" class="form-label">Produit</label> -->
                                    <select class="form-select" name="idproduit[]" required>
                                        <?php
                                        foreach ($produits as $produit) {
                                            echo '<option value="' . $produit['idproduit'] . '">' . $produit['nomproduit'] . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>
                            </td>
                            <td>
                                <div class="">
                                    <!-- <label for="quantiteEntrer" class="form-label">Quantité Entrée (Kg)</label> -->
                                    <input type="number" class="form-control" name="quantiteEntrer[]" required>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <!-- Ajouter un identifiant pour le bouton supprimer -->
                                    <button type="button" class="btn btn-danger " onclick="supprimerLigne(this)">Supprimer</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-5">Enregistrer l'Entrée</button>
        </form>
    </div>
    <!-- Modal -->
<div class="modal fade" id="deleteAlertModal" tabindex="-1" role="dialog" aria-labelledby="deleteAlertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAlertModalLabel">Alerte</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                Vous ne pouvez pas supprimer la dernière ligne.
            </div>

        </div>
    </div>
</div>

    <?php
    include_once(__DIR__ . '/../inc/footer.php');
    // include_once ('../s/Menu/navigation.php'); 

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function ajouterProduit() {
            var produitsDiv = document.querySelector('.produits');
            var cloneProduit = produitsDiv.cloneNode(true);
            var select = cloneProduit.querySelector('select');
            var input = cloneProduit.querySelector('input');

            // Modifier les noms des champs pour les rendre uniques
            select.name = 'idproduit[]';
            input.name = 'quantiteEntrer[]';

            // Insérer le nouveau champ avant le premier élément de la liste
            produitsDiv.parentNode.insertBefore(cloneProduit, produitsDiv);

            // Effacer les valeurs dans le champ ajouté
            select.value = '';
            input.value = '';
        }

        function supprimerLigne(button) {
        // Récupérer la ligne parente du bouton
        var ligneProduit = button.closest('.produits');

        // Vérifier s'il y a plus d'une ligne avant de supprimer
        var lignesProduit = document.querySelectorAll('.produits');
        if (lignesProduit.length > 1) {
            // Supprimer la ligne seulement s'il y a plus d'une ligne
            ligneProduit.remove();
        } else {
            // Afficher une fenêtre modale Bootstrap pour l'alerte
            $('#deleteAlertModal').modal('show');
        }
    }

        
    </script>
    