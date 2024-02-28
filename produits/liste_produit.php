    <?php
    include_once "../utils/utils.class.php";
    $produits = Utils::all("produits");
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Liste des Produits</title>

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
                <div class="input-group w-100 d-flex  justify-content-center  ">
                    <div class="w-50 mb-5 d-flex">
                        <input type="text" name="searche" id="searche" class="form-control " placeholder="Rechercher par nom de produit">
                        <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                    </div>
                </div>
            <form action="delete_produit.php" method="post">


                <table class="table table-striped">
                    <thead class="table-dark opacity-75">
                        <tr>
                            <!-- <th></th> -->
                            <th scope="col">ID</th>
                            <th scope="col">Nom Produits</th>
                            <th scope="col">Description</th>
                            <th scope="col">QTE</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date Ajouter</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($produits as $p) { ?>
                            <tr style="display:none;">
                                <!-- <th><input type="checkbox" name="IDProduits[]" id="" value="<?= $p['IDProduit'] ?>"></th> -->
                                <th scope="row"><?= $p['IDProduit'] ?></th>
                                <td><?= $p['NomProduit'] ?></td>
                                <td><?= $p['DescriptionProduit'] ?></td>
                                <td><?= $p['QuantiteStock'] ?></td>
                                <td><?= $p['Type'] ?></td>
                                <td><?=  date('Y-m-d', strtotime($p['DateDM']))?></td>
                                <td>
                                    <!-- <a href="delete_produit.php?IDProduit=<?= $p['IDProduit'] ?>" class="btn btn-danger">S</a> -->
                                    <a href="edit_produit.php?IDProduit=<?= $p['IDProduit'] ?>" class="btn btn-outline-secondary "><i class='bx bxs-edit'></i></a>
                                    <a href="detailProduits.php?IDProduit=<?= $p['IDProduit'] ?>&nom=<?= $p['NomProduit'] ?>" class="btn btn-outline-primary"><i class='bx bx-info-circle'></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- <button>Supprimer</button> -->
            </form>
        </div>

        <?php
        include_once(__DIR__ . '/../inc/footer.php');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- MDB -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searche');
                const tableRows = document.querySelectorAll('tbody tr');

                searchInput.addEventListener('input', function() {
                    const searchQuery = searchInput.value.toLowerCase();

                    tableRows.forEach(function(row) {
                        const nomProduitCell = row.querySelector('td:nth-child(2)'); // 3 est l'index de la colonne "Nom Produit"
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