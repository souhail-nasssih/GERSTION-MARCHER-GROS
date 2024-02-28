<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$connexion = connecter();
$place = "SELECT EtatPlace, NomPlace FROM places WHERE EtatPlace = 'Disponible'";
$EtaPlace = mysqli_query($connexion, $place);





?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/mdb.min.css" /> and
  <link rel="stylesheet" href="css/mdb.dark.min.css" />
  <?php
  include_once(__DIR__ . './inc/header.php');
  ?>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
  <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>
<style>
  .grey-bg {  
    background-color: #F5F7FA;
}

</style>


<body id="body-pd">



  <header>
    <?php
    // require_once '../menu/__menu.php';
    include_once(__DIR__ . './inc/sidebar.php');
    ?>
  </header>
  <!--Container Main start-->
  <div class="grey-bg container-fluid">
    <section id="minimal-statistics">
      <div class="row ">
        <div class="col-12 mt-3 mb-1">
          <h4 class="text-uppercase">dashboard</h4>
        </div>
      </div>
      <div class="row d-flex justify-content-center ">
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body text-left">
                  <h3 class="success">156</h3>
                  <span>New Clients</span>
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
                    <h3>423</h3>
                    <span>Total Visits</span>
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
                  <h3>64.89 %</h3>
                  <span>Bounce Rate</span>
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
                  <div class="media-body text-left">
                    <h3 class="danger">423</h3>
                    <span>Total Visits</span>
                  </div>
                  <div class="align-self-center">
                    <i class="icon-direction danger font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>




    </section>

    <section>
      <!-- Table 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">

    <div class="row justify-content-end">
      <div class="col-12 col-lg-9 col-xl-4">
        <div class="card widget-card border-light shadow-sm">
          <div class="card-body p-4">
            <h5 class="card-title widget-card-title mb-4">Place  Disponible</h5>
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
                    <td class="text-success   " ><?= $row['EtatPlace'] ?></td>
                 
               
                </tbody>
               <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    </section>









  </div>
  <!--Container Main end-->
  <?php
  include_once(__DIR__ . './inc/footer.php');
  ?>
</body>

</html>