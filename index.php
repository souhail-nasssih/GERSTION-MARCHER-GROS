<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/mdb.min.css" /> and <link rel="stylesheet" href="css/mdb.dark.min.css" />
  <?php 
  include_once(__DIR__ . './inc/header.php');
  ?>
  
</head>

  

  <body id="body-pd">



    <header>
        <?php
        // require_once '../menu/__menu.php';
        include_once(__DIR__ . './inc/sidebar.php');
        ?>
    </header>
    <!--Container Main start-->
    <div class="min-vh-100 bg-light" style="margin-top: 40px">
      <div class="container py-5">
        <h4>Main Components</h4>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Produits</h5>
                <div class="bg-primary text-white p-3">
                  <h3 class="text-center"><i class="bx bxs-cube"></i> 25</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Statistique 2</h5>
                <div class="bg-success text-white p-3">
                  <h3 class="text-center"><i class="bx bxs-cube"></i> 50</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Statistique 3</h5>
                <div class="bg-warning text-white p-3">
                  <h3 class="text-center"><i class="bx bxs-cube"></i> 75</h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Container Main end-->
    <?php 
    include_once(__DIR__ . './inc/footer.php');
    ?>
  </body>
</html>
