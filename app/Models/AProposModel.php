<?php

namespace Projet\Models;

class AProposModel extends TempsDaimeOrm
{

    public function affichePropos()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT id,image,descriptif_image,titre,texte FROM a_propos");
        return $req;
    }

    public function afficheProposAccueil()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT id,image,descriptif_image,titre,texte FROM a_propos ORDER BY id ASC LIMIT 1");
        return $req->fetch();
    }

    public function propos($idPropos)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT id,image,descriptif_image,titre,texte FROM a_propos WHERE id = ?");
        $req->execute(array($idPropos));
        return $req->fetch();
    }

    public function updatePropos($idArticle,$descriptif,$titre,$texte){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE a_propos SET descriptif_image = ? , titre = ?, texte = ? WHERE id = ?");
        $req->execute(array($descriptif,$titre,$texte,$idArticle));
    }

    public function updateProposImg($idArticle,$path,$descriptif,$titre,$texte){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE a_propos SET image = ? , descriptif_image = ? , titre = ?, texte = ? WHERE id = ?");
        $req->execute(array($path,$descriptif,$titre,$texte,$idArticle));
    }

    

}

?>