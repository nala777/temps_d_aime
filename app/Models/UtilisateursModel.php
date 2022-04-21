<?php

namespace Projet\Models;

class UtilisateursModel extends TempsDaimeOrm
{

    public function nbrCompteUtilisateurs(){
        $bdd = $this->connect();
        $req = $bdd->query('SELECT(SELECT COUNT(id) FROM utilisateurs WHERE id) AS countUsers');
        return $req->fetch();
    }
}