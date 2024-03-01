<?php 
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();

// Récupérer les clients dont l'ID est uniquement dans la table fromEntrer avec l'IDEntrer associé
$query = "SELECT c.IDClient, c.NomClient, c.AdresseClient, c.N_identif, MAX(e.DateEntrer) AS DateEntrer, MAX(e.IDEntrer) AS IDEntrer
          FROM clients c
          INNER JOIN fromEntrer e ON c.IDClient = e.IDClient
          LEFT JOIN fromSortir s ON c.IDClient = s.IDClient
          WHERE s.IDSortir IS NULL
          GROUP BY c.IDClient order by IDEntrer desc";
$result = mysqli_query($cnx, $query);

?>

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
    <div class="input-group w-100 d-flex  justify-content-center  mt-5">
        <div class="w-50 mb-5 d-flex">
            <input type="text" name="searche" id="searche" class="form-control " placeholder="Rechercher par CIN">
            <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
        </div>
    </div>
    <div class="container mt-3">
        <table class="table table-striped">
            <thead class="table-dark opacity-75">
                <tr>
                    <!-- <th>IDEntrer</th>
                    <th>IDClient</th> -->
                    <th>Nom</th>
                    <th>CIN</th>
                    <th>Place</th>
                    <th>Adresse</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { 
                    // Récupérer l'ID de la place occupée par ce client
                    $IDClient = $row['IDClient'];
                    $placeQuery = "SELECT e.IDPlace
                                   FROM fromEntrer e
                                   WHERE e.IDClient = '$IDClient'";
                    $placeResult = mysqli_query($cnx, $placeQuery);
                    $placeRow = mysqli_fetch_assoc($placeResult);
                    $IDPlaceOccupee = $placeRow['IDPlace'];
                    $place=mysqli_query($cnx,"SELECT *from places where IDPlace ='$IDPlaceOccupee' ");
                    $p=mysqli_fetch_assoc($place);

                ?>
                    <tr>
                        <td hidden><?= $row['IDEntrer'] ?></td>
                        <td hidden><?= $row['IDClient'] ?></td>
                        <td class="fw-bold text-center"><?= $row['NomClient'] ?></td>
                        <td><?= $row['N_identif'] ?></td>
                        <td><?= $p['NomPlace'] ?></td> <!-- Afficher l'ID de la place occupée -->
                        <td><?= $row['AdresseClient'] ?></td>
                        <td class="w-25"><?=  date('Y-m-d', strtotime($row['DateEntrer'])) ?></td>
                        <td class=" w-100 d-flex">
                            <a href="http://localhost/nvappe/frmsortir/frmSortir.php?IDEntrer=<?= $row['IDEntrer'] ?>&IDClient=<?= $row['IDClient'] ?>" class="nav-link m-2 ">
                                <button type="submit" class="btn btn-outline-success "><i class='bx bx-log-out-circle '></i></button>
                            </a>
                            <!-- <a href="http://localhost/nvappe/AfficherEntrer/modifierFrnmEntrer.php?IDEntrer=<?= $row['IDEntrer'] ?>&IDClient=<?= $row['IDClient'] ?>" class="nav-link m-2">
                                <button type="submit" class="btn btn-outline-secondary"><i class='bx bxs-edit '></i></button>
                            </a> -->
                            <a href="#" class="nav-link m-2" data-toggle="modal" data-target="#confirmDeleteModal" onclick="setDeleteUrl('<?= $row['IDEntrer'] ?>', '<?= $row['IDClient'] ?>')">
                                <button type="submit" class="btn btn-outline-danger"><i class='bx bx-x' ></i></button>

                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- Reste du code HTML... -->

    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette sortie ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a id="confirmDeleteButton" href="#" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once(__DIR__ . '/../inc/footer.php');
    ?>
    <script>
        function setDeleteUrl(IDEntrer, IDClient) {
            var deleteUrl = 'http://localhost/nvappe/AfficherEntrer/supprimerEntrer.php?IDEntrer=' + IDEntrer + '&IDClient=' + IDClient;
            document.getElementById('confirmDeleteButton').setAttribute('href', deleteUrl);
        }
    </script>
             <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searche');
                const tableRows = document.querySelectorAll('tbody tr');

                searchInput.addEventListener('input', function() {
                    const searchQuery = searchInput.value.toLowerCase();

                    tableRows.forEach(function(row) {
                        const nomProduitCell = row.querySelector('td:nth-child(4)'); // 3 est l'index de la colonne "Nom Produit"
                        const nomProduit = nomProduitCell.textContent.toLowerCase();

                        if (nomProduit.includes(searchQuery)) {
                            row.style.display = ''; // Afficher la ligne si le nom du produit correspond à la recherche
                        } else {
                            row.style.display = 'none'; // Masquer la ligne si le nom du produit ne correspond pas à la recherche
                        }
                    });
                });

                // Afficher toutes les lignes du tableau initialement
                tableRows.forEach(function(row) {
                    row.style.display = '';
                });
            });
        </script>

</body>

</html>