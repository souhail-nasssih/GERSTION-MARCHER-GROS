<?php
include_once "../utils/Utils.class.php";
class Produit
{
    //data 
    public $nomproduit;
    public $description;
    public $date;
    public $type;

    //methodes
    //
    function __construct($nomproduit, $description, $date, $type)
    {
        $this->nomproduit = $nomproduit;
        $this->description = $description;
        $this->date = $date;
        $this->type = $type;
    }
    public function ajouter_produit()
    {
        try {
            //connection db
            $cnx = Utils::connecter_db();
            //preparer une requete SQL 
            $rp = $cnx->prepare("insert into produits (NomProduit,DescriptionProduit,DateDM,type) values(?,?,?,?)");
            //execution
            $rp->execute([$this->nomproduit, $this->description, $this->date, $this->type]);
        } catch (\Throwable $th) {
            echo "Erreur d'ajout d'un Produit " . $th->getMessage();
        }
    }

    public function modifier_produit($id)
    {
        try {
            //connection db
            $cnx = Utils::connecter_db();
            //preparer une requete SQL 
            $rp = $cnx->prepare("update produits set NomProduit=?,DescriptionProduit=?,DateDM=?, Type=? where IDProduit=?");
            //execution
            $rp->execute([$this->nomproduit, $this->description, $this->date,$this->type, $id]);
        } catch (\Throwable $th) {
            echo "Erreur de modification d'un produit " . $th->getMessage();
        }
    }
    static public function find_produit($id)
    {
        try {
            $cnx = Utils::connecter_db();
            $rp = $cnx->prepare("SELECT
            HP.IDHistorique,
            P.NomProduit,
            HP.QuantiteSortie,
            HP.PrixVente,
            HP.DateSortie
        FROM
            HistoriqueProduits HP
        JOIN
            Produits P ON HP.IDProduit = P.IDProduit
        WHERE
            P.IDProduit =?
        ORDER BY
            HP.DateSortie DESC");
            $rp->execute([$id]); // Execute the query with the provided ID
            $res = $rp->fetchAll();
            return $res;
        } catch (\Throwable $e) {
            echo "Error de find Produits" . $e->getMessage();
        }
    }
}
