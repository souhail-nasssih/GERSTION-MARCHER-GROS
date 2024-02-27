
<?php

function connecter()
{
    $cnx = mysqli_connect("localhost", "root", "", "appmarcher");
    return $cnx;
}
//fuction de ajouter
function ajouter_produit($table, $libelle, $prix, $qte)
{
    $cnx = connecter();
    mysqli_query($cnx, "INSERT INTO $table (libelle, prix, qte) VALUES ('$libelle', '$prix', '$qte')");
}
function supprimer($table,$idtable ,$id)
{
    $cnx = connecter();
    mysqli_query($cnx, "DELETE from $table where $idtable =$id");
}
function afficher($table)
{
    $cnx = connecter();
    return mysqli_query($cnx, "SELECT *FROM $table");
}
function afficher_P($table, $id)
{
    $cnx = connecter();
    return mysqli_query($cnx, "SELECT *FROM $table WHERE id=$id");
}
function modifier_produit($id, $libelle, $prix, $qte)
{
    $cnx = connecter();
    mysqli_query($cnx, "UPDATE produits SET libelle='$libelle', prix='$prix', qte='$qte' WHERE id='$id'");
}

function retourner($lien)
{
    return header($lien);
}
function supprimerm($table, $ids)
{
    $cnx = connecter();
    $ids = $_POST['id'];
    foreach ($ids as $k => $v) {
        mysqli_query($cnx, "DELETE from $table where id=$v");
    }
}
