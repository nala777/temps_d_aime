<?php

namespace Projet\Models;

class BlogModel extends TempsDaimeOrm
{
    // public $id;
    // public $image;
    // public $desciptif_image;
    // public $categorie;
    // public $date;
    // public $titre;
    // public $texte;

    public function afficheArticle()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT categorie,image,descriptif_image, DATE_FORMAT(date_article, '%d/%m/%Y') AS date,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie ORDER BY blog.id DESC ");
        return $req;
    } 
}

?>