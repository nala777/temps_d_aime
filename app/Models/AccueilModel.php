<?php

namespace Projet\Models;

class AccueilModel extends TempsDaimeOrm
{
 
    public function afficheProposAccueil()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT id,image,descriptif_image,titre,texte FROM a_propos ORDER BY id ASC LIMIT 1");
        return $req;
    }

    public function afficheServicesAccueil()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT logo,titre,texte,alt_logo FROM services ORDER BY id ASC LIMIT 3");
        return $req;
    }

    public function postMailAccueil($name, $mail,$subject, $content){
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO contact(nom,mail,sujet,texte) VALUE (?,?,?,?)');
        $req->execute(array($name, $mail,$subject, $content));
        return $req;
    }

}

?>