<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nouveau employer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

  <div class="container">
    <div class="col-md-4 mx-auto">
      <form method="post" action="ajoute_produit.php">
        <div class="mb-3">
          <label for="nom" class="form-label">Nom Produit :</label>
          <input name="nomproduit" type="text" required class="form-control" id="nom" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="prenom" class="form-label">Description :</label>
          <input name="description" type="text" required class="form-control" id="description" aria-describedby="emailHelp">
        </div>
        <select class="form-select mb-3 " id="selectType" aria-label="Sélectionnez un type">
            <option selected disabled>Sélectionnez un type</option>
            <option value="Fruit">Fruit</option>
            <option value="Légume">Légume</option>
          </select>

        <button type="submit" class="btn btn-primary">Aoujter</button>
      </form>
    </div>
  </div>
  <?php
  include_once(__DIR__ . '/../inc/footer.php');
  ?>
</body>

</html>