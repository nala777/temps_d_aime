<?php

namespace Projet\Models;

class ServicesModel extends TempsDaimeOrm
{
    public function afficheServices()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT  FROM blog INNER JOIN categories ON categories.id = blog.id_categorie ORDER BY blog.id DESC ");
        return $req;
    }
}

?>