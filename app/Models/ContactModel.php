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
}