<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');
$cnx = connecter();

$query = "SELECT c.IDClient, c.NomClient, c.N_identif, MAX(s.IDSortir) AS IDSortir, MAX(s.DateSortir) AS DateSortir, MAX(e.IDEntrer) AS IDEntrer
          FROM clients c
          INNER JOIN fromSortir s ON c.IDClient = s.IDClient
          LEFT JOIN fromEntrer e ON c.IDClient = e.IDClient
          GROUP BY c.IDClient, c.NomClient, c.N_identif
          ORDER BY IDSortir DESC";


$result = mysqli_query($cnx, $query);

if (!$result) {
    die('Erreur dans la requête SQL : ' . mysqli_error($cnx));
}
