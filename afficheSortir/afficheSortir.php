<?php
include_once "__AfficheSortir.php";
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
    <header class="">
        <?php
        include_once '../menu/__menu.php';
        include_once(__DIR__ . '/../inc/sidebar.php');
        ?>
    </header>

    <div class="container mt-5">
        <table class="table table-striped">
            <thead class="table-dark opacity-75">
                <tr>
                    <th>IDSortir</th>
                    <th>IDEntrer</th>
                    <th>Nom</th>
                    <th>Identif</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_object()) { ?>
                    <tr>
                        <td><?= $row->IDSortir ?></td>
                        <td hidden><?= $row->IDClient ?></td>
                        <td><?= $row->IDEntrer ?></td>
                        <td><?= $row->NomClient ?></td>
                        <td><?= $row->N_identif ?></td>
                        <td class="w-25"><?= date('Y-m-d', strtotime($row->DateSortir)) ?></td>
                        <td class="w-100 d-flex">
                            <a href="http://localhost/nvappe/afficheSortir/modifierFrmSortir.php?IDClient=<?= $row->IDClient ?>&IDEntrer=<?= $row->IDEntrer ?>&IDSortir=<?= $row->IDSortir ?>" class="nav-link m-2">
                                <button type="submit" class="btn btn-outline-secondary "><i class='bx bxs-edit '></i></button>

                            </a>
                            <a href="#" class="nav-link m-2" data-toggle="modal" data-target="#confirmDeleteModal<?= $row->IDClient ?>">
                                <button type="button" class="btn btn-outline-danger"><i class='bx bx-undo'></i></button>
                            </a>
                        </td>
                    </tr>

                    <!-- Modal de confirmation de suppression -->
                    <div class="modal fade" id="confirmDeleteModal<?= $row->IDClient ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Annuler la Sortie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Êtes-vous sûr de vouloir annuler cette sortie ?
                                </div>
                                <div class="modal-footer">
                                    <!-- Bouton pour annuler la suppression (fermer le modal) -->
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <!-- Bouton pour confirmer la suppression -->
                                    <a href="__supprimer.php?IDClient=<?= $row->IDClient ?>" class="btn btn-danger">Annuler la Sortie</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php
    include_once(__DIR__ . '/../inc/footer.php');
    ?>
</body>

</html>
