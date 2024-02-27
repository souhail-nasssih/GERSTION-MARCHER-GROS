<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$connexion = connecter();

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupérer l'ID du client depuis la variable GET
$IDClient = $_GET['IDClient'];
$q = "SELECT * from clients where IDClient=$IDClient";
$clients = mysqli_query($connexion, $q);
$c = $clients->fetch_object();
// Requête pour récupérer les produits du client avec leurs quantités entrées depuis la base de données
// Requête pour récupérer les produits du client avec leurs quantités entrées depuis la base de données
$sql = "SELECT p.idproduit, p.nomproduit, e.quantiteEntrer FROM produits p
        LEFT JOIN fromEntrer e ON p.idproduit = e.idproduit
        WHERE e.IDClient = $IDClient";

$resultat = mysqli_query($connexion, $sql);

// Stockage des données dans un tableau PHP
$produits = [];
while ($row = mysqli_fetch_assoc($resultat)) {
    $produits[] = $row;
}
// Récupérer tous les produits
$sqlProduits = "SELECT idproduit, nomproduit FROM produits";
$resultatProduits = mysqli_query($connexion, $sqlProduits);

// Stockage des produits dans un tableau PHP
$allProduits = [];
while ($rowProduit = mysqli_fetch_assoc($resultatProduits)) {
    $allProduits[] = $rowProduit;
}

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
    ?>
</head>

<body>

    <header>
        <?php
        require_once '../menu/__menu.php';
        include_once(__DIR__ . '/../inc/sidebar.php');
        ?>
    </header>
    <div class="container mt-5">
        <h2>Formulaire d'Entrée</h2>
        <form action="http://localhost/nvappe/AfficherEntrer/__traitModifier.php" method="post" autocomplete="off">
            <!-- Informations sur le client -->
            <div class="mb-3">
                <input type="hidden" name="IDClient" value="<?= $IDClient ?>">
                <label for="nomClient" class="form-label">Nom du Client</label>
                <input type="text" class="form-control" id="nomClient" name="nomClient" required value="<?= $c->NomClient ?>">
            </div>
            <div class="mb-3">
                <label for="adresseClient" class="form-label">Adresse du Client</label>
                <input type="text" class="form-control" id="adresseClient" name="adresseClient" required value="<?= $c->AdresseClient ?>">
            </div>
            <div class="mb-3">
                <label for="autresInfosClient" class="form-label">N°Carte de Client</label>
                <input type="text" class="form-control" id="autresInfosClient" name="N_identif" value="<?= $c->N_identif ?>">
            </div>
            <div class="col d-flex justify-content-center h-100 align-content-center">
                <button type="button" class="btn btn-success" onclick="ajouterProduit()">Ajouter Produit</button>
            </div>

            <div class="">
                <div class="produits d-flex gap-3 align-items-center">
                    <table class="table table-striped">
                        <thead class="table-dark opacity-75">
                            <tr>
                                <th>Produit</th>
                                <th>Quantité Entrée (Kg)</th>
                            </tr>
                        </thead>
                        <?php foreach ($produits as $produit) { ?>
                            <tr>
                                <td>
                                    <div class="mb-3 w-auto">
                                        <input type="text" class="form-control" disabled value="<?= $produit['nomproduit'] ?>">
                                        <input hidden value="<?= $produit['idproduit'] ?>"></input>

                                    </div>
                                </td>
                                <td>
                                    <div class="">
                                        <input type="number" class="form-control" name="quantiteEntrer[]" required value="<?= $produit['quantiteEntrer'] ?>">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <button type="button" class="btn btn-danger" onclick="supprimerLigne(this)">Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>

            <button type="submit" class="btn btn-warning">Modifier l'Entrée</button>
        </form>
    </div>
    <!-- Modal Suppression -->
    <!-- Boîte de dialogue modale pour la confirmation de suppression -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette ligne ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" onclick="confirmerSuppression()">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once(__DIR__ . '/../inc/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function ajouterProduit() {
            var produitsTable = document.querySelector('.produits table');

            // Construire les options du select
            var optionsProduits = '';
            <?php foreach ($allProduits as $produit) { ?>
                optionsProduits += '<option value="<?= $produit['idproduit'] ?>"><?= $produit['nomproduit'] ?></option>';
            <?php } ?>

            // Construire la nouvelle ligne HTML
            var newRowHTML = '<tr>' +
                '<td>' +
                '<div class="mb-3 w-auto">' +
                '<select class="form-select" name="idproduit[]" required>' +
                optionsProduits +
                '</select>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="">' +
                '<input type="number" class="form-control" name="quantiteEntrer[]" required value="">' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="d-flex flex-column justify-content-center align-items-center">' +
                '<button type="button" class="btn btn-danger" onclick="supprimerLigne(this)">Supprimer</button>' +
                '</div>' +
                '</td>' +
                '</tr>';

            // Ajouter la nouvelle ligne à la table
            produitsTable.innerHTML += newRowHTML;
        }

        function supprimerLigne(button) {
            // Récupérer la ligne parente du bouton
            var ligneProduit = button.closest('tr');

            // Vérifier s'il y a plus d'une ligne avant d'afficher la modale
            var lignesProduit = document.querySelectorAll('.produits tr');

            if (lignesProduit.length > 2) {
                // Afficher la modale de confirmation
                var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
                confirmationModal.show();

                // Enregistrez la ligne à supprimer dans une variable globale
                window.ligneASupprimer = ligneProduit;
            } else {
                alert("Vous ne pouvez pas supprimer la dernière ligne.");
            }

            // Si aucune ligne n'est restante, ajouter une nouvelle ligne
            if (document.querySelectorAll('.produits tr').length === 0) {
                ajouterProduit();
            }
        }

        // Fonction pour confirmer la suppression après avoir cliqué sur "Supprimer" dans la modale
        function confirmerSuppression() {
            // Récupérer la ligne à supprimer depuis la variable globale
            var ligneProduit = window.ligneASupprimer;

            // Supprimer la ligne
            ligneProduit.remove();

            // Fermer la modale
            var confirmationModal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
            confirmationModal.hide();
        }
    </script>