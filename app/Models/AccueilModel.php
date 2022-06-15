<?php

namespace Projet\Models;

class AccueilModel extends TempsDaimeOrm
{
    // envoie formulaire contact page accueil

    public function postMailAccueil($name, $mail,$subject, $content){
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO contact(nom,mail,sujet,texte) VALUE (?,?,?,?)');
        $req->execute(array($name, $mail,$subject, $content));
        return $req;
    }
}

?>