<?php
include_once "produit.class.php";
$id = isset($_GET['IDProduit']);
extract($_POST);
$dateActuelle = date('Y-m-d H:i:s');
$pro = new Produit($NomProduit, $DescriptionProduit, $dateActuelle);
$pro->modifier_produit($id);
