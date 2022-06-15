<?php

namespace Projet\Models;

class AProposModel extends TempsDaimeOrm
{

    // affichage pour page a propos
    public function affichePropos()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT id,image,descriptif_image,titre,texte FROM a_propos");
        return $req;
    }
    // affichage premier article a propos sur accueil
    public function afficheProposAccueil()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT id,image,descriptif_image,titre,texte FROM a_propos ORDER BY id ASC LIMIT 1");
        return $req->fetch();
    }

    // select d'un article à propos pour update pour pré remplir formulaire
    public function propos($idPropos)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,image,descriptif_image,titre,texte FROM a_propos WHERE id = ?");
        $req->execute(array($idPropos));
        return $req->fetch();
    }

    // update de l'article à propos sans image
    public function updatePropos($data){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE a_propos SET descriptif_image = :descriptif , titre = :titre, texte = :texte WHERE id = :id");
        $req->execute(array(
            ":descriptif" => $data['descriptif'],
            ":titre" => $data['titre'],
            ":texte" => $data['texte'],
            ":id" => $data['id']
        ));
    }

    // update de l'article à propos avec image
    public function updateProposImg($data){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE a_propos SET image = :image , descriptif_image = :descriptif , titre = :titre, texte = :texte WHERE id = :id");
        $req->execute(array(
            ":image" => $data['image'],
            ":descriptif" => $data['descriptif'],
            ":titre" => $data['titre'],
            ":texte" => $data['texte'],
            ":id" => $data['id']
        ));
    }

}

?>