<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');

    $cnx = connecter();
    $id = $_GET['id'];
    print_r($_GET['id']);
    $query = "SELECT DISTINCT
    c.NomClient, c.AdresseClient, c.N_identif,c.tel ,
    e.QuantiteEntrer, s.QuantiteSortir, s.PrixVente, e.DateEntrer, 
    p.NomPlace, pr.NomProduit
    FROM 
    clients c  
    JOIN fromsortir s ON s.IDClient = c.IDClient
    JOIN produits pr ON pr.IDProduit = s.IDProduit
    JOIN fromentrer e ON e.IDClient = c.IDClient AND e.IDProduit = s.IDProduit
    JOIN places p ON p.IDPlace = e.IDPlace
    WHERE c.N_identif = '$id'";
    
    $res = mysqli_query($cnx, $query);
    $result = mysqli_query($cnx, $query);
    $row = mysqli_fetch_assoc($result);
    

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

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <li class="breadcrumb-item"><a href="http://localhost/nvappe/clients/afficheCLients.php">Vendeur</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Profile Vendeur</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="./img/profil-removebg-preview.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?= $row['NomClient'] ?></h5>
                            <p class="text-muted mb-1">Vendeur dans Marcher BioVita</p>
                            <p class="text-muted mb-4"><?= $row['AdresseClient'] ?></p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $row['NomClient'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">CIN</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $row['N_identif'] ?></p>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $row['tel'] ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?= $row['AdresseClient'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="container mb-5 ">
                            <table class="table table-striped">
                                <thead class="table-dark opacity-75">
                                    <tr>
                                        <th>QTE Entrer</th>
                                        <th>QTE Sortir</th>
                                        <th>PrixVente</th>
                                        <th>Date</th>
                                        <th>Place</th>
                                        <th>Produits</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>

                                        <td><?= $row['QuantiteEntrer'] ?></td>
                                        <td><?= $row['QuantiteSortir'] ?></td>
                                        <td><?= $row['PrixVente'] ?></td>
                                        <td><?= date('Y-m-d', strtotime($row['DateEntrer'])); ?></td>
                                        <td><?= $row['NomPlace'] ?></td>
                                        <td><?= $row['NomProduit'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

















    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>


</body>

</html>