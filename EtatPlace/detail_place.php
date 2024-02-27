<?php
require('C:/laragon/www/NVAPPE/connection/__connection.php');

// Connecter à la base de données
$cnx = connecter();

// Vérifier si l'ID de la place est passé via GET
if(isset($_GET['id'])) {
    // Récupérer et sécuriser l'ID de la place
    $id = mysqli_real_escape_string($cnx, $_GET['id']);

    // Construire la requête SQL avec la valeur sécurisée
    $query = "SELECT c.NomClient, c.n_identif, f.DateEntrer, p.nomplace, p.IDPlace
              FROM clients c
              JOIN fromentrer f ON c.idclient = f.idclient
              JOIN places p ON p.IDPlace = f.IDPlace
              WHERE p.IDPlace = '$id'
              GROUP by c.NomClient, c.n_identif, f.DateEntrer, p.nomplace, p.IDPlace ";
    
    // Exécuter la requête
    $result = mysqli_query($cnx, $query);
} else {
    echo "L'ID de la place n'est pas spécifié.";
    exit; // Arrêter l'exécution si l'ID de la place n'est pas fourni
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Formulaire d'Entrée</title>
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
    <div class="container mt-5">
        <table class="table table-striped">
            <thead class="table-dark opacity-75">
                <tr>
                    <th>ID Place</th>
                    <th>Nom</th>
                    <th>Nom du Client</th>
                    <th>Date</th>
                    <th>Identifiant</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['IDPlace']; ?></td>
                        <td><?= $row['nomplace']; ?></td>
                        <td><?= $row['NomClient']; ?></td>
                        <td><?= date('Y-m-d', strtotime($row['DateEntrer'])); ?></td>
                        <td><?= $row['n_identif']; ?></td>
                    </tr>
  
               
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>
