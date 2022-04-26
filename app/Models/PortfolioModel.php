<?php

namespace Projet\Models;

class PortfolioModel extends TempsDaimeOrm
{

    public function afficheCategories(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT nom,id FROM categories_folio");
        return $req;
    }

    public function afficheFolio(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT portfolio.id,nom,image,alt FROM portfolio INNER JOIN categories_folio ON categories_folio.id = portfolio.id_catfolio ORDER BY portfolio.id DESC");
        return $req;
    }

    public function afficheFolioAccueil(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT id,image,alt FROM portfolio ORDER BY id DESC LIMIT 3");
        return $req;
    }
    
    public function ajoutPortfolio($path,$descriptif,$categories){
        
            $bdd = $this->connect();
            $req = $bdd->prepare("INSERT INTO portfolio (image,alt,id_catfolio) VALUE (?,?,?)");
            $req->execute(array($path,$descriptif,$categories));
    }

    public function supprFolio($idFolio){

        $bdd = $this->connect();
        $req = $bdd->prepare("DELETE FROM portfolio WHERE id = ?");
        $req->execute(array($idFolio));
    }
    
}