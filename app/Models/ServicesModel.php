<?php

namespace Projet\Models;

class ServicesModel extends TempsDaimeOrm
{
    public function afficheServices()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT logo,titre,texte,alt_logo FROM services ORDER BY id DESC");
        return $req;
    }
}

?>