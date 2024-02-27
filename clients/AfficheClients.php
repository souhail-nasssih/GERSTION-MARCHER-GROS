<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();
$query = "SELECT 
N_identif,
MIN(NomClient) AS NomClient,
MIN(AdresseClient) AS AdresseClient,
MIN(tel) AS tel
FROM 
clients
GROUP BY 
N_identif;";




$result = mysqli_query($cnx, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire d'Entrée</title>
    <link rel="stylesheet" href="clients.css">
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
                    <input type="text" name="searche" id="searche" class="form-control" placeholder="Rechercher par CIN">
                    <span class="input-group-text"><i class='bx bx-search-alt-2'></i></span>
                </div>
            </div>
        
        <section style="background-color: #f8f9fa;">
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col">
                            <div class="card border-0 shadow">
                                <div class="card-body d-flex align-items-center">
                                    <img src="./img/profil-removebg-preview.png" alt="avatar" class="rounded-circle img-fluid me-3" style="width: 100px;">
                                    <div class="info">
                                        <h5 class="name"><?= $row['NomClient']; ?></h5>
                                        <p class="text-muted mb-1 address">Adresse : <?= $row['AdresseClient']; ?></p>
                                        <p class="text-muted mb-1 phone">Telephone : <?= $row['tel']; ?></p>
                                        <p class="text-muted mb-0 n_identif">CIN : <?= $row['N_identif']; ?></p>
                                        <div class="text-center mt-3">
                                            <a href="detailClient.php?id=<?= $row['N_identif'] ?>" class="btn btn-outline-primary btn-details "><i class='bx bx-info-circle'></i> Détails</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searche');
            const cards = document.querySelectorAll('.card');

            searchInput.addEventListener('input', function() {
                const searchQuery = searchInput.value.toLowerCase();

                cards.forEach(function(card) {
                    const nomClient = card.querySelector('.card-body h5').textContent.toLowerCase();

                    if (nomClient.includes(searchQuery)) {
                        card.style.display = ''; // Afficher la carte si le nom du client correspond à la recherche
                    } else {
                        card.style.display = 'none'; // Masquer la carte si le nom du client ne correspond pas à la recherche
                    }
                });
            });

            // Afficher toutes les cartes initialement
            cards.forEach(function(card) {
                card.style.display = '';
            });
        });
    </script> -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searche');
    const cardsContainer = document.querySelector('.row');
    const cards = document.querySelectorAll('.col');

    // Cette fonction filtre les cartes en fonction de la recherche
    function filterCards(searchQuery) {
        cards.forEach(function(card) {
            const nIdentif = card.querySelector('.n_identif').textContent.trim().toLowerCase();

            if (nIdentif.includes(searchQuery)) {
                card.style.display = 'block'; // Afficher la carte si elle correspond à la recherche
            } else {
                card.style.display = 'none'; // Masquer la carte si elle ne correspond pas à la recherche
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

</body>

</html>