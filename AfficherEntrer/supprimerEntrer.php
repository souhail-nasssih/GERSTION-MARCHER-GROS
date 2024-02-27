<?php
include_once('C:/laragon/www/NVAPPE/utils/utils.class.php');
include_once('C:/laragon/www/NVAPPE/fumction/function.php');
$idClient = $_GET['IDClient'];
Utils::supprimer('fromentrer', 'IDClient', $idClient);
retourner("location:afficherFE.php");
