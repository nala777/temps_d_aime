<?php

namespace Projet\Models;

class AdminModel extends TempsDaimeOrm
{
    // création admin
    public function creatAdmin($firstname,$lastname,$mdp,$mail)
    {
        $bdd = $this->connect();
        $user = $bdd->prepare('INSERT INTO admin(prenom,nom,mdp,mail) VALUE (?,?,?,?)');
        $user->execute(array($firstname,$lastname,$mdp,$mail));
        return $user;
    }

    // recupération du mot de passe en lien avec le mail
    public function recupMdp($mail, $mdp)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare('SELECT mail,mdp,nom,prenom,id FROM admin WHERE mail=?');
        $req->execute(array($mail));

        return $req;
    }
    

}

?>