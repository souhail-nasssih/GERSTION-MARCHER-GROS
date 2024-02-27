<?php
include_once('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();
$IDClient = isset($_GET['IDClient']) ? $_GET['IDClient'] : '';
$IDEntrer = isset($_GET['IDEntrer']) ? $_GET['IDEntrer'] : '';
$IDSortir = isset($_GET['IDSortir']) ? $_GET['IDSortir'] : '';

// Récupérer les informations du client
$re = mysqli_query($cnx, "SELECT * FROM clients WHERE IDClient = '$IDClient'");
$c = $re->fetch_object();

// Récupérer tous les produits avec les quantités entrées liées au client
$query = "SELECT produits.*, SUM(fromentrer.QuantiteEntrer) AS quantiteEntrer
          FROM produits
          LEFT JOIN fromentrer ON produits.IDProduit = fromentrer.IDProduit
          WHERE fromentrer.IDClient = '$IDClient'
          GROUP BY produits.IDProduit";

$rep = mysqli_query($cnx, $query);

$res = mysqli_query($cnx, "SELECT produits.*, fromsortir.*
FROM produits
LEFT JOIN fromsortir ON produits.IDProduit = fromsortir.IDProduit
WHERE fromsortir.IDClient = '$IDClient'");

$produits = array();
while ($p = $rep->fetch_object()) {
    $produits[] = $p;
}

// Assurez-vous que $fsm est un tableau pour stocker toutes les sorties
$fsm = array();
while ($fs = $res->fetch_object()) {
    $fsm[] = $fs;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire de Sortie</title>
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
    <div class="row">
        <div class="container">
            <div class="col-6 container">
                <form action="__modifierSortir.php?id=<?= $IDSortir ?>" method="post" id="sortieForm">
                    <!-- Informations sur le client -->
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="idClient" name="IDClient" value="<?= $c->IDClient ?>">
                    </div>
                    <!-- Autres champs pour les informations du client -->
                    <div class="mb-3">
                        <h5 id="nomClient" name="NomClient">Nom Client : <?= $c->NomClient ?></h5>
                    </div>
                    <div class="mb-3">
                        <h5 id="adresseClient" name="AdresseClient">Adresse Client : <?= $c->AdresseClient ?></h5>
                    </div>
                    <div class="mb-3">
                        <h5 id="N_identif" name="N_identif">N identif : <?= $c->N_identif ?></h5>
                    </div>
                    <!-- Informations sur les produits et les quantités totales entrées -->
                    <!-- Récupérer l'IDEntrer ici -->
                    <input type="hidden" name="IDEntrer" value="<?= $IDEntrer ?>">
                    <table class="table table-striped">
                        <thead class="table-dark opacity-75">
                            <tr>
                                <th>Produit</th>
                                <th>Quantité Entrée (Kg)</th>
                                <th>Quantité Sortie (Kg)</th>
                                <th>Prix de Vente (DHS)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produits as $key => $produit) { ?>
                                <tr>
                                    <td>
                                        <input type="hidden" name="IDProduit[]" value="<?= $produit->IDProduit ?>">
                                        <h5 name="NomProduit[]"><?= $produit->NomProduit ?></h5>
                                    </td>
                                    <td>
                                        <h5 name="quantiteEntrer"><?= $produit->quantiteEntrer ?></h5>
                                    </td>
                                    <td>
                                        <input type="text" name="quantiteSortir[]" class="quantiteSortir form-control " value="<?= $fsm[$key]->QuantiteSortir ?>" required>
                                    </td>
                                    <td>
                                        <input type="text" name="PrixVent[]" class="prixVente form-control " value="<?= $fsm[$key]->PrixVente ?>" required>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <button type="button" class="btn btn-primary" onclick="validateForm()">Enregistrer la Sortie</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Erreur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="errorModalBody">
                    <!-- Error message content will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once(__DIR__ . '/../inc/footer.php');
    ?>
<script>
    function validateForm() {
        var quantiteSortirInputs = document.querySelectorAll('[name="quantiteSortir[]"]');
        var prixVenteInputs = document.querySelectorAll('[name="PrixVent[]"]');
        var isValid = true;
        var invalidProducts = [];

        // Vérification de la quantité sortir et du prix de vente pour chaque produit
        for (var i = 0; i < quantiteSortirInputs.length; i++) {
            var quantiteSortir = quantiteSortirInputs[i].value.trim();
            var prixVente = prixVenteInputs[i].value.trim();

            if (quantiteSortir === '' || prixVente === '') {
                isValid = false;
                invalidProducts.push(document.querySelectorAll('[name="NomProduit[]"]')[i].innerText + ' - Quantité: ' + quantiteSortir);
            } else {
                var quantiteEntrerElement = document.querySelectorAll('[name="quantiteEntrer"]')[i];
                var quantiteEntrer = parseFloat(quantiteEntrerElement.innerText);

                if (isNaN(quantiteEntrer) || parseFloat(quantiteSortir) > quantiteEntrer) {
                    isValid = false;
                    invalidProducts.push(document.querySelectorAll('[name="NomProduit[]"]')[i].innerText + ' - Quantité entrée: ' + quantiteEntrer + ', Quantité sortie: ' + quantiteSortir);
                }
            }
        }

        if (!isValid) {
            var errorMessage = "Veuillez remplir tous les champs et assurez-vous que la quantité de sortie ne dépasse pas la quantité d'entrée pour les produits suivants:\n";
            errorMessage += invalidProducts.join('\n');

            // Affichage de l'erreur dans une fenêtre modale
            document.getElementById('errorModalBody').innerText = errorMessage;
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'));
            myModal.show();
        } else {
            // Si tout est valide, soumettre le formulaire
            document.getElementById('sortieForm').submit();
        }
    }
</script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>