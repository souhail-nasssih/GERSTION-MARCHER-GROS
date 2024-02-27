<?php
include_once "../utils/utils.class.php";
$produit = Utils::find('produits','IDProduit' ,$_GET['IDProduit']);
// print_r($produit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition de l'produit</title>
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
            <form method="post" action="Modifier_produit.php">
                <input type="hidden" name="id" value="<?= $produit['IDProduit'] ?>">
                <div class="mb-3">
                    <label for="nom" class="form-label">Prouits :</label>
                    <input value="<?= $produit['NomProduit'] ?>" name="NomProduit" type="text" required class="form-control" id="nom">
                </div>
                <div class="mb-3">
                    <label for="prenom" class="form-label">Desription :</label>
                    <input value="<?= $produit['DescriptionProduit'] ?>" name="DescriptionProduit" type="text" required class="form-control" id="Desription">
                </div>
                

                <button type="submit" class="btn btn-success">modifier</button>
            </form>
        </div>
    </div>

    <?php 
    include_once(__DIR__ . '/../inc/footer.php');
    ?>
</body>

</html>