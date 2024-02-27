    <?php
    include_once("__frmSortir.php");
    $place = mysqli_query($cnx, "SELECT IDPlace
    FROM fromentrer
    WHERE IDClient = '$IDClient';");
    $p =  $place->fetch_object();
    // print_r($p);
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
        <header>x`
            <?php
            require_once '../menu/__menu.php';
            include_once(__DIR__ . '/../inc/sidebar.php');
            ?>
        </header>
        <div class="container ">
            <div class="row">
                <div class="col-6 container ">
                    <form id="sortieForm" action="__ajouteSortir.php?idP=<?= $p->IDPlace ?>" method="post">
                        <!-- Informations sur le client -->
                        <div class="mb-3">
                            <input type="hidden" id="idClient" name="IDClient" value="<?= $row->IDClient ?>">
                        </div>
                        <!-- Autres champs pour les informations du client -->
                        <div class="mb-3">
                            <label for="nomClient" class="form-label">Nom Client</label>
                            <h5 id="nomClient" name="NomClient"><?= $row->NomClient ?></h5>
                        </div>
                        <div class="mb-3">
                            <label for="adresseClient" class="form-label">Adresse Client</label>
                            <h5 id="adresseClient" name="AdresseClient"><?= $row->AdresseClient ?></h5>
                        </div>
                        <div class="mb-3">
                            <label for="nIdentif" class="form-label">N identif</label>
                            <h5 id="nIdentif" name="N_identif"><?= $row->N_identif ?></h5>
                        </div>
                        <!-- Informations sur les produits et les quantités totales entrées -->
                        <!-- Récupérer l'IDEntrer ici -->
                        <input type="hidden" name="IDEntrer" value="<?= $IDEntrer ?>">

                        <table class="table table-striped">
                            <thead class="table-dark opacity-75">
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantité Totale Entrée (Kg)</th>
                                    <th>Quantité Totale vendu (Kg)</th>
                                    <th>Prix de vents (DHS)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($produits as $produit) { ?>

                                    <tr>
                                        <td>
                                            <input type="hidden" name="IDProduit[]" value="<?= $produit->IDProduit ?>">
                                            <h5 name="NomProduit[]"><?= $produit->NomProduit ?></h5>
                                        </td>
                                        <td>
                                            <h5 name="quantiteEntrer"><?= $produit->quantiteEntrer ?></h5>
                                        </td>
                                        <td required>
                                            <input type="number" name="quantiteSortir[]" class="quantiteSortir form-control" id="qte" required>
                                        </td>
                                        <td required>
                                            <input type="number" class="prix form-control" name="PrixVent[]" id="prix" required>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <div class="mb-3">
                            <input type="hidden" class="form-control" name="confirmS">
                        </div>

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
                var quantiteSortirInputs = document.querySelectorAll('.quantiteSortir');
                var prixVenteInputs = document.querySelectorAll('[name="PrixVent[]"]');
                var isValid = true;
                var invalidProducts = [];

                // Vérification de la quantité sortie et du prix de vente pour chaque produit
                quantiteSortirInputs.forEach(function(input, index) {
                    var quantiteSortir = input.value.trim();
                    var prixVente = prixVenteInputs[index].value.trim();
                    var quantiteEntrer = parseFloat(input.closest('tr').querySelector('[name="quantiteEntrer"]').innerText);
                    var nomProduit = input.closest('tr').querySelector('[name="NomProduit[]"]').innerText;

                    if (quantiteSortir === '' || prixVente === '') {
                        isValid = false;
                        invalidProducts.push(nomProduit + ' - Quantité: ' + quantiteSortir);
                    } else if (parseFloat(quantiteSortir) > quantiteEntrer) {
                        isValid = false;
                        invalidProducts.push(nomProduit + ' - Quantité entrée: ' + quantiteEntrer + ', Quantité sortie: ' + quantiteSortir);
                    }
                });

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