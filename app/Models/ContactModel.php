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
        $req = $bdd->query('SELECT COUNT(DISTINCT mail) AS countContact FROM contact');
        return $req->fetch();
    }

    public function nbrMail(){
        $bdd = $this->connect();
        $req = $bdd->query('SELECT COUNT(id)  AS countMail FROM contact');
        return $req->fetch();
    }

    public function voirMails() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT id,nom,mail,sujet,texte FROM contact ORDER BY id DESC');
        $req->execute(array());
        $mails = $req->fetchAll();

        return $mails;
    }
    
    public function voirMail($idMail) {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT nom,mail,sujet,texte,created_at FROM CONTACT WHERE id = ?');
        $req->execute(array($idMail));
        $mail = $req->fetch();
        return $mail;
    }

    public function deleteMail($idMail) {
        $bdd = $this->connect();
        $req = $bdd->prepare('DELETE FROM contact WHERE id = ?');
        $req->execute(array($idMail));
    }

    public function voirContact() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT DISTINCT mail AS contact,nom FROM contact ORDER BY nom');
        $req->execute(array());
        $contacts = $req->fetchAll();
        
        return $contacts;
    }

    
}