<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();
$query = "SELECT * from places";
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
    <div class="container mt-5">
        <div class="input-group w-100 d-flex  justify-content-center  ">
            <div class="w-50 mb-5 d-flex">
                <input type="text" name="searche" id="searche" class="form-control " placeholder="Rechercher par nom de place">
                <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
            </div>
        </div>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['NomPlace']; ?></h5>
                            <p class="card-text etat-place"><?= $row['EtatPlace']; ?></p>
                            <a href="detail_place.php?id=<?= $row['IDPlace'] ?>" class="btn btn-outline-primary"><i class='bx bx-info-circle'></i> Détails</a>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">ID Place: <?= $row['IDPlace']; ?></small>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const etatPlaceElements = document.querySelectorAll('.etat-place');

            etatPlaceElements.forEach(function(element) {
                element.classList.add('fw-bold');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searche');
            const cards = document.querySelectorAll('.card');

            // Cette fonction filtre les cartes en fonction de la recherche
            function filterCards(searchQuery) {
                cards.forEach(function(card) {
                    const nomPlace = card.querySelector('.card-title').textContent.trim().toLowerCase();

                    if (nomPlace.includes(searchQuery)) {
                        card.parentNode.style.display = 'block'; // Afficher la carte si elle correspond à la recherche
                    } else {
                        card.parentNode.style.display = 'none'; // Masquer la carte si elle ne correspond pas à la recherche
                    }
                });
            }

            // Exécuter la fonction de filtrage lorsque l'utilisateur saisit quelque chose dans le champ de recherche
            searchInput.addEventListener('input', function() {
                const searchQuery = searchInput.value.trim().toLowerCase();
                filterCards(searchQuery);
            });

            // Filtrer également les cartes lors du chargement initial de la page
            filterCards('');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const etatPlaceElements = document.querySelectorAll('.etat-place');

            etatPlaceElements.forEach(function(element) {
                const etat = element.textContent.trim().toLowerCase();

                if (etat.includes('occupe')) { // Vérification si la chaîne contient "occupe" indépendamment de la casse
                    element.classList.add('text-danger');
                } else if (etat === 'disponible') {
                    element.classList.add('text-success');
                }
            });
        });
    </script>

</body>

</html>