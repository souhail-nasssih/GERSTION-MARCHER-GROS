<?php
// Connexion à la base de données (utilisation de mysqli_connect)
$connexion = mysqli_connect("localhost", "root", "", "appmarcher");
$connexion = connecter();       

// Vérification de la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Requête pour récupérer les places disponibles depuis la base de données
$sql = "SELECT IDPlace, NomPlace FROM places WHERE EtatPlace = 'Disponible'";
$resultat = mysqli_query($connexion, $sql);     

// Vérification des résultats et création du menu déroulant
if (mysqli_num_rows($resultat) > 0) {
    echo '<select class="form-select" id="idPlace" name="idPlace" required>';
    echo '<option value="">Sélectionner une place</option>'; // Option par défaut

    // Affichage des options de sélection des places
    while ($row = mysqli_fetch_assoc($resultat)) {
        echo '<option value="' . $row['IDPlace'] . '">' . $row['NomPlace'] . '</option>';
    }

    echo '</select>';
} else {
    echo "Aucune place disponible.";
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
