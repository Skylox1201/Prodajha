<?php 
require_once('Modele.php');

class Utilisateurs extends Modele
{
    function connexion($mail){
        $req = "SELECT email, password, nom, prenom, idClient FROM client WHERE email = ?";
        return $this->execRequete($req, [$mail])->fetch();
    }

    function userExist($mail){
        $req = "SELECT email FROM client WHERE email = ?";
        return $this->execRequete($req, [$mail])->fetchAll();
    }

    function inscription($nom, $prenom, $mail, $password){
        $req = "INSERT INTO client(nom, prenom, email, password) VALUES(?, ?, ?, ?)";
        return $this->execRequete($req, [$nom, $prenom, $mail, $password]);
    }
}
?>