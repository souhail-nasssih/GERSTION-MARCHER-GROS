<?php
include_once "./produit.class.php";
$id = $_GET['IDProduit'];
$nom = $_GET['nom'];

$res = Produit::find_produit($id);
foreach ($res as $produit) {
    $nomproduit = $produit["NomProduit"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails des Produits</title>
    <!-- Inclure Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4" style="background-image: url(../clients/img/breadcrumb-bg.jpg);">
                    <ol class="breadcrumb mb-0">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                        <li class="breadcrumb-item "><a href="http://localhost/nvappe/clients/afficheCLients.php" class="text-light ">Produits</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page"> Detail Produits</li>
                    </ol>
                </nav>
            </div>
        </div>
        <h2>Détails de <?= $nom ?></h2>
        <table class="table table-striped">
            <thead class="table-dark opacity-75">
                <tr>
                    <th>ID</th>
                    <th>Nom du Produit</th>
                    <th>Date</th>
                    <th>Quantité /Kg</th>
                    <th>Prix de Vente/Kg</th>
                    <!-- Ajoutez d'autres en-têtes au besoin -->
                </tr>
            </thead>
            <tbody>
                <?php if ($res == null) {
                    echo '<h1 class="text-danger">Pas des Operation pour ce Produits</h1>';
                } else {
                    foreach ($res as $historique) : ?>
                        <tr>
                            <td><?= $historique['IDHistorique']; ?></td>
                            <td><?= $historique['NomProduit']; ?></td>
                            <td><?= date('Y-m-d', strtotime($historique['DateSortie'])); ?></td>
                            <td><?= $historique['QuantiteSortie']; ?></td>
                            <td><?= $historique['PrixVente']; ?>DHS</td>
                            <!-- Ajoutez d'autres colonnes au besoin -->
                        </tr>
                    <?php endforeach; ?>


                <?php  } ?>
            </tbody>
        </table>
    </div>
    <?php
    include_once(__DIR__ . '/../inc/footer.php');
    ?>
    <!-- Inclure Bootstrap JS (facultatif, mais nécessaire pour certaines fonctionnalités) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>