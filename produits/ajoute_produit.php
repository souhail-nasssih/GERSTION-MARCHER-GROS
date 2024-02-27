<?php
include_once "../utils/utils.class.php";
include_once "produit.class.php";
extract($_POST);
$dateActuelle = date('Y-m-d H:i:s');
$depart = new Produit($nomproduit, $description, $dateActuelle);
$depart->ajouter_produit();
