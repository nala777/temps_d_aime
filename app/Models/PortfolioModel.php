<?php

namespace Projet\Models;

class PortfolioModel extends TempsDaimeOrm
{

    // affichage catégories
    public function afficheCategories(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT nom,id FROM categories_folio");
        return $req;
    }

    // affichage des image du portfolio
    public function afficheFolio(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT portfolio.id,nom,image,alt FROM portfolio INNER JOIN categories_folio ON categories_folio.id = portfolio.id_catfolio ORDER BY portfolio.id DESC");
        return $req;
    }

    // affichage des derniers image du portfolio sur accueil
    public function afficheFolioAccueil(){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,image,alt FROM portfolio ORDER BY id DESC LIMIT 6");
        $req->execute(array());
        return $req;
    }
    
    // envoie en bdd nouvelle image
    public function ajoutPortfolio($path,$descriptif,$categories){
        
            $bdd = $this->connect();
            $req = $bdd->prepare("INSERT INTO portfolio (image,alt,id_catfolio) VALUE (?,?,?)");
            $req->execute(array($path,$descriptif,$categories));
    }

    // suppression image
    public function supprFolio($idFolio){

        $bdd = $this->connect();
        $req = $bdd->prepare("DELETE FROM portfolio WHERE id = ?");
        $req->execute(array($idFolio));
    }
   
}