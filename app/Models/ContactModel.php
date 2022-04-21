<?php

namespace Projet\Models;

class ContactModel extends TempsDaimeOrm
{
    public function postMail($name, $mail, $subject, $content){
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO contact(nom,mail,sujet,texte) VALUE (?,?,?,?)');
        $req->execute(array($name, $mail, $subject, $content));
        return $req;
    }

    public function nbrContact(){
        $bdd = $this->connect();
        $req = $bdd->query('SELECT(SELECT COUNT(DISTINCT mail) FROM contact WHERE id) AS countContact');
        return $req->fetch();
    }

    public function nbrMail(){
        $bdd = $this->connect();
        $req = $bdd->query('SELECT(SELECT COUNT(id) FROM contact WHERE id) AS countMail');
        return $req->fetch();
    }
}