<?php
require_once('Modele.php');

class Panier extends Modele
{
    function articleInPanier($idart, $idC){
        $requete = "SELECT * from panier WHERE idArticle=? AND idClient=?;";
        if($this->execRequete($requete, [$idart, $idC])->fetchAll()){
            return True;
        }else{
            return False;
        }
    }
    
    function afficherPanier($idC){
        $requete = "SELECT panier.idClient, article.idArticle, panier.quantite AS pQuantite,
        article.prix, article.nom, article.image, article.quantite AS aQuantite FROM panier
        INNER JOIN article ON panier.idArticle = article.idArticle WHERE idClient = ?";
        return $this->execRequete($requete, [$idC])->fetchAll();
    }

    function verifPanier($idart, $idC){
        $requete = "SELECT idArticle FROM panier WHERE idArticle=? AND idClient=?";
        if($this->execRequete($requete, [$idart, $idC])->fetch()){
            return True;
        }else{
            return False;
        }	
    }

    function ajoutPanier($idC, $idart, $qart){
        $request = "INSERT INTO panier (idClient, idArticle, quantite) VALUES (?, ?, ?) ";
        return $this->execRequete($request, [$idC, $idart, $qart]);
    }

    function modifPanier($idart, $idC, $quant){
        $request = "UPDATE panier SET quantite=? WHERE idClient=? AND idArticle=?";
        return $this->execRequete($request, [$quant, $idC, $idart]);
    }

    function suprPanier($idC, $idart){
        $request = "DELETE FROM panier WHERE idClient=? AND idArticle=?";
        return $this->execRequete($request, [$idC, $idart]);
    }
}
?>