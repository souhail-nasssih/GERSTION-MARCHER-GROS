<?php
include_once('C:/laragon/www/NVAPPE/utils/utils.class.php');

try {
    // Récupération de la connexion à la base de données depuis Utils.class.php
    $pdo = Utils::connecter_db();

    // Récupération des données du formulaire en utilisant la méthode POST
    $login = $_POST['login'];
    $mot_de_passe = $_POST['passwd']; // Renommé de passwrd à password pour correspondre au formulaire

    // Requête préparée pour vérifier les identifiants dans la table users
    $requete = $pdo->prepare("SELECT * FROM users WHERE login=? AND passwd=?");

    $requete->execute([$login, $mot_de_passe]);

    // Vérification du résultat de la requête
    if ($requete->rowCount() > 0) {
        // Utilisateur trouvé, connexion réussie
        // Récupération des informations de l'utilisateur
        $user = $requete->fetch(PDO::FETCH_ASSOC);

        // Redirection vers liste_admin.php avec les informations de l'utilisateur
        header("Location:http://localhost/nvappe/index.php"); // Utilisation de id_user pour correspondre à la base de données
        exit();
    } else {
        // Aucun utilisateur trouvé, affichage d'un message d'erreur
        echo "Erreur de connexion. Veuillez vérifier vos identifiants.";
    }
} catch (PDOException $e) {
    // Gestion des erreurs PDO
    echo "Une erreur s'est produite : " . $e->getMessage();
}
// if (!(adherent::checkAdh($_SESSION['login'], $_SESSION['passwd']))) header("Location:../Connexion/login.class.php");
// $appelerClass = new adherent($nome = "", $prenom = "", $email = "", $adresse = "", $motDePasse = "", $dateDinscreption = "");
// $a = $appelerClass->afficher_un_adherent($_SESSION['email']);
// $nomPersone = "";
// $prenomPersone = "";
// // print_r($a['nom']);
// // print_r($_SESSION['email']);
// if (!empty($a)) {
//     $nomPersone = $a['nom'];
//     $prenomPersone = $a['prenom'];
// } else {
//     $appelerClass = new adherent($nome = "", $prenom = "", $email = "", $adresse = "", $motDePasse = "", $dateDinscreption = "");
//     $w = $appelerClass->afficher_un_admin($_SESSION['email']);
//     $nomPersone = $w['nom'];
// }
