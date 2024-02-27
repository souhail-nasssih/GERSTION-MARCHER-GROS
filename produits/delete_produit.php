<?php
include_once "../utils/utils.class.php";
//recuperer l'id 
if (isset($_GET['IDProduit'])) {
    $id = $_GET['IDProduit']; 
    Utils::supprimer('produits','IDProduit',$id );
}

if (!empty($_POST['IDProduits'])) {
    foreach ($_POST['IDProduits'] as $id) {

        Utils::supprimer('produits','IDProduit',$id);
    }
}
// header("location:liste_employees.php");
