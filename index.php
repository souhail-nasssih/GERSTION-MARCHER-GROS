<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');

// Connexion à la base de données
$connexion = connecter();
$place = "SELECT EtatPlace, NomPlace FROM places WHERE EtatPlace = 'Disponible'";
$EtaPlace = mysqli_query($connexion, $place);


$place1 = "SELECT c.nomclient, c.n_identif, p.nomplace, f.identrer, p.EtatPlace,f.DateEntrer
FROM clients c
JOIN (
    SELECT IDClient, MAX(IDEntrer) AS MaxID
    FROM fromentrer
    GROUP BY IDClient
) AS latest_entry ON c.IDClient = latest_entry.IDClient
JOIN fromentrer f ON latest_entry.IDClient = f.IDClient AND latest_entry.MaxID = f.IDEntrer
JOIN (
    SELECT IDPlace, MAX(IDEntrer) AS MaxIDEntrer
    FROM fromentrer
    GROUP BY IDPlace
) AS latest_place_entry ON f.IDPlace = latest_place_entry.IDPlace AND f.IDEntrer = latest_place_entry.MaxIDEntrer
JOIN places p ON p.IDPlace = f.IDPlace
WHERE p.EtatPlace = 'Occupee'
ORDER BY f.IDEntrer DESC limit 4;";

$EtaPlace1 = mysqli_query($connexion, $place1);



// Vérification de la connexion
if ($connexion->connect_error) {
  die("Connection failed: " . $connexion->connect_error);
}

// Requête SQL pour obtenir le nombre total de vendeurs distincts
$sqlVendeurs = "SELECT COUNT(DISTINCT n_identif) AS nombre_total_vendeurs FROM clients";
$resultVendeurs = $connexion->query($sqlVendeurs);

// Récupération du nombre total de vendeurs
if ($resultVendeurs->num_rows > 0) {
  $rowVendeurs = $resultVendeurs->fetch_assoc();
  $nombre_total_vendeurs = $rowVendeurs["nombre_total_vendeurs"];
} else {
  $nombre_total_vendeurs = 0;
}

// Requête SQL pour obtenir le nombre total de clients
$sqlClients = "SELECT COUNT(*) AS total_clients FROM clients_vendeur";
$resultClients = mysqli_query($connexion, $sqlClients);

// Récupération du nombre total de clients
if ($resultClients) {
  $rowClients = mysqli_fetch_assoc($resultClients);
  $total_clients = $rowClients["total_clients"];
} else {
  $total_clients = 0;
}

// Requête SQL pour obtenir le nombre total de factures
$sqlTotalFactures = "SELECT COUNT(DISTINCT facture_id) AS nombre_total_factures FROM ventes";
$resultTotalFactures = mysqli_query($connexion, $sqlTotalFactures);

$sqlTotalFactures = "SELECT COUNT(DISTINCT facture_id) AS total_factures FROM ventes";
$resultTotalFactures = mysqli_query($connexion, $sqlTotalFactures);

// Vérification des résultats
if ($resultTotalFactures) {
  $row = mysqli_fetch_assoc($resultTotalFactures);
  $total_factures = $row['total_factures'];
} else {
  $total_factures = 0;
}

$sqlTotalProduitsVendus = "SELECT SUM(qte) AS total_produits FROM ventes";
$resultTotalProduitsVendus = mysqli_query($connexion, $sqlTotalProduitsVendus);

if ($resultTotalProduitsVendus) {
  $row = mysqli_fetch_assoc($resultTotalProduitsVendus);
  $total_produits_vendus = $row['total_produits'];
} else {
  $total_produits_vendus = 0;
}
$sqlp = "SELECT p.NomProduit, SUM(v.qte) AS total_ventes 
        FROM ventes v 
        INNER JOIN produits p ON v.produit_id = p.idproduit 
        GROUP BY p.NomProduit 
        ORDER BY total_ventes DESC 
        LIMIT 5";
$result = mysqli_query($connexion, $sqlp);


// Tableaux pour stocker les données des produits et des quantités vendues
$produits = [];
$quantites = [];

// Récupération des données depuis la base de données
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $produits[] = $row['NomProduit'];
    $quantites[] = $row['total_ventes'];
  }
}

$sql2 = "SELECT p.type, SUM(v.qte) AS total_ventes 
FROM ventes v
JOIN produits p ON v.produit_id = p.idproduit
GROUP BY p.type;
";
$result = mysqli_query($connexion, $sql2);

// Tableaux pour stocker les données des catégories et des ventes
$categories = [];
$ventes = [];

// Récupération des données depuis la base de données
if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row['type'];
    $ventes[] = $row['total_ventes'];
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/mdb.dark.min.css" />
  <link rel="stylesheet" href="css/mdb.min.css" />
  <?php
  include_once(__DIR__ . './inc/header.php');
  ?>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>
<style>
  .grey-bg {
    background-color: #F5F7FA;
  }
</style>


<body id="body-pd">



  <header>
    <?php
    //  include_once './menu/__menu.php';
    include_once(__DIR__ . './inc/sidebar.php');
    ?>
  </header>
  <!--Container Main start-->
  <div class="grey-bg container-fluid mt-5 ">
    <section id="minimal-statistics">
      <div class="row ">
        <div class="col-12 mt-3 mb-1">
          <h4 class="text-uppercase">dashboard</h4>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="success"><?php echo $nombre_total_vendeurs; ?></h3>
                    <span>Total vendeur</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-user success font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                  <i class="icon-pointer danger font-large-2 float-left"></i>
                                  </div>
                  <div class="media-body text-right">
                    <h3><?php echo $total_clients; ?></h3>
                    <span>Total Clients</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="align-self-center">
                    <i class="icon-graph success font-large-2 float-left"></i>
                  </div>
                  <div class="media-body text-right">
                    <h3><?php echo $total_factures; ?></h3>
                    <span>Factures Vents</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Carte pour le nombre total de produits vendus -->
        <div class="col-xl-3 col-sm-6 col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="danger"><?php echo $total_produits_vendus; ?></h3>
                    <span> QTE Produits Vendus</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-direction danger font-large-2 float-right"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>




    </section>

    <section>
      <!-- Table 1 - Bootstrap Brain Component -->
      <section class="py-3 py-md-5">
        <div class="container-fluid">

          <div class="row d-flex justify-content-between ">
            <div class=" card col-6 card widget-card border-light shadow-sm">
              <h5 class="card-title widget-card-title m-2">Produits plus vents</h5>
              <canvas id="barChart" class="w-100 h-100"></canvas>
            </div>
            <div class="col-6 col-lg-9 col-xl-4  ">
              <div class="card widget-card border-light shadow-sm">
                <div class="card-body p-4">
                  <h5 class="card-title widget-card-title mb-4">Place Disponible</h5>
                  <div class="table-responsive">
                    <table class="table table-borderless bsb-table-xl text-nowrap align-middle m-0">
                      <thead>
                        <tr>
                          <th>Place</th>
                          <th>Etat</th>

                        </tr>
                      </thead>
                      <?php while ($row = mysqli_fetch_assoc($EtaPlace)) { ?>

                        <tbody>
                          <td><?= $row['NomPlace'] ?></td>
                          <td class="text-success   "><?= $row['EtatPlace'] ?></td>


                        </tbody>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid ">
          <div class="row d-flex justify-content-between">
            <div class="col-6 card widget-card border-light shadow-sm">
              <table class="table table-borderless bsb-table-xl text-nowrap align-middle m-0">
                <thead>
                  <tr>
                    <th>Nom vendeur</th>
                    <th>CIN</th>
                    <th>Nom Place</th>
                    <!-- <th>Place Occupee</th> -->
                    <!-- <th>Date</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row1 = mysqli_fetch_assoc($EtaPlace1)) { ?>
                    <tr>
                      <td><?= $row1['nomclient'] ?></td>
                      <td class=""><?= $row1['n_identif'] ?></td>
                      <td class=""><?= $row1['nomplace'] ?></td>
                      <!-- <td class="text-success"><?= $row1['EtatPlace'] ?></td> -->
                      <!-- <td class="w-25"><?=  date('Y-m-d', strtotime($row1['DateEntrer'])) ?></td> -->
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

            </div>
            <div class="col-6">
              <div class=" card card widget-card border-light shadow-sm w-100 ">
                <h5 class="card-title widget-card-title m-2">Produits plus vents</h5>
                <div class="w-100 d-flex  justify-content-center ">
                  <canvas id="pieChart" class="w-50 h-50 mb-2"></canvas>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script>
        // Configuration du graphique à barres
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
          type: 'bar',
          data: {
            labels: <?php echo json_encode($produits); ?>, // Noms des produits
            datasets: [{
              label: 'Quantité Vendue',
              data: <?php echo json_encode($quantites); ?>, // Quantités vendues
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            },
            tooltips: {
              callbacks: {
                label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var currentValue = dataset.data[tooltipItem.index];
                  return 'Quantité: ' + currentValue;
                }
              }
            }
          }
        });
      </script>
      <script>
        // Configuration du graphique à secteurs (pie chart)
        var ctx = document.getElementById('pieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
          type: 'pie',
          data: {
            labels: <?php echo json_encode($categories); ?>, // Noms des catégories de produits
            datasets: [{
              data: <?php echo json_encode($ventes); ?>, // Total des ventes pour chaque catégorie
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Rouge
                'rgba(54, 162, 235, 0.2)', // Bleu
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
              ],
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            legend: {
              position: 'top',
            },
            title: {
              display: true,
              text: 'Répartition des ventes par catégorie de produits'
            },
            animation: {
              animateScale: true,
              animateRotate: true
            }
          }
        });
      </script>

</body>

</html>