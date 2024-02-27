<?php

class Utils
{


    //fonction/methode pour se connecter a une base de donnnees
    public static function connecter_db()
    {
        try {
            $cnx = new PDO('mysql:host=localhost;dbname=appmarcher', "root", "");
            return $cnx;
        } catch (\Throwable $th) {
            echo "Erreur de connexion base de donnees ";
        } finally {
            //  echo "Fin du programme";
        }
    }
    public static    function all($table)
    {

        try {
            $cnx = Utils::connecter_db();
            $rp = $cnx->prepare("select * from $table ");
            $rp->execute();
            return $rp->fetchAll();
        } catch (\Throwable $th) {
            echo "Erreur de selection $table " . $th->getMessage();
        }
    }
    static public function supprimer($table, $colonne, $valeur) {
        try {
            // Connexion à la base de données
            $cnx = Utils::connecter_db();
            
            // Préparation de la requête SQL
            $rp = $cnx->prepare("DELETE FROM $table WHERE $colonne = ?");
            
            // Exécution de la requête en passant la valeur de l'IDClient
            $rp->execute([$valeur]);
        } catch (\Throwable $th) {
            echo "Erreur de suppression des enregistrements de $table en fonction de $colonne : " . $th->getMessage();
        }
    }
    

    static public function find($table,$idtable,$id){
        try {
            $cnx = Utils::connecter_db();
            $rp = $cnx->prepare("SELECT * from $table where $idtable=?");
            $rp->execute([$id]); // Execute the query with the provided ID
            $resultat=$rp->fetch();
            return $resultat;
        }
        catch(\Throwable $e){
                echo "Error de find $table". $e->getMessage();
    }
}
}