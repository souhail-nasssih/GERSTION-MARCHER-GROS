<?php
include_once "produit.class.php";

// Vérification si IDProduit est défini dans $_GET
if (!isset($_GET['IDProduit']) || !is_numeric($_GET['IDProduit'])) {
    // Gérer le cas où IDProduit n'est pas valide
    exit("IDProduit non valide");
}

$id = $_GET['IDProduit']; // Récupération de l'IDProduit depuis $_GET
extract($_POST);
$dateActuelle = date('Y-m-d H:i:s');

// Assurez-vous que le nom du champ de sélection dans le formulaire est correctement défini
$type = isset($Type) ? $Type : null;

$pro = new Produit($NomProduit, $DescriptionProduit, $dateActuelle, $type);
$pro->modifier_produit($id);

// header("location: liste_produit.php");
