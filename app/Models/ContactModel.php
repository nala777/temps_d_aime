<?php

namespace Projet\Models;

class ContactModel extends TempsDaimeOrm
{
    // envoie formulaire en bdd formulaire accueil
    public function postMail($name, $mail, $subject, $content){
        $bdd = $this->connect();
        $req = $bdd->prepare('INSERT INTO contact(nom,mail,sujet,texte) VALUE (?,?,?,?)');
        $req->execute(array($name, $mail, $subject, $content));
        return $req;
    }

    // compte le nombre de contact présent dans le carnet d'addresse
    public function nbrContact(){
        $bdd = $this->connect();
        $req = $bdd->query('SELECT COUNT(DISTINCT mail) AS countContact FROM contact');
        return $req->fetch();
    }

    // compte le nombre de mails reçu
    public function nbrMail(){
        $bdd = $this->connect();
        $req = $bdd->query('SELECT COUNT(id)  AS countMail FROM contact');
        return $req->fetch();
    }

    // affichage des différents mails reçu
    public function voirMails() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT id,nom,mail,sujet,texte FROM contact ORDER BY id DESC');
        $req->execute(array());
        $mails = $req->fetchAll();

        return $mails;
    }
    
    // affichage d'un mail
    public function voirMail($idMail) {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT nom,mail,sujet,texte,created_at FROM CONTACT WHERE id = ?');
        $req->execute(array($idMail));
        $mail = $req->fetch();
        return $mail;
    }

    // delete un mail
    public function deleteMail($idMail) {
        $bdd = $this->connect();
        $req = $bdd->prepare('DELETE FROM contact WHERE id = ?');
        $req->execute(array($idMail));
    }

    // voir contact pour carnet addresse
    public function voirContact() {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT DISTINCT mail AS contact,nom FROM contact ORDER BY nom');
        $req->execute(array());
        $contacts = $req->fetchAll();
        
        return $contacts;
    }

    
}