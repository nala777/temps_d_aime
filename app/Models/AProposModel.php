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
        return $req;
    }

}

?>