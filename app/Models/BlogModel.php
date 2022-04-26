<?php

namespace Projet\Models;

class BlogModel extends TempsDaimeOrm
{
    public function afficheArticle()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT blog.id,categorie,image,descriptif_image, DATE_FORMAT(date_article, '%d/%m/%Y') AS date,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie ORDER BY blog.id DESC ");

        return $req;
    }

    public function lastArticles()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT categorie,image,descriptif_image, DATE_FORMAT(date_article, '%d/%m/%Y') AS date,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie ORDER BY blog.id DESC LIMIT 3");
        return $req;
    }

    public function afficheCategories(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT categorie,id FROM categories");
        return $req;
    }

    public function upload($path,$descriptif,$categories,$titre,$texte){
        $bdd = $this->connect();
        $req = $bdd->prepare("INSERT INTO blog (image,descriptif_image,id_categorie,titre,texte) VALUE (?,?,?,?,?)");
        $req->execute(array($path,$descriptif,$categories,$titre,$texte));
    }

    public function ajoutCategorie($categorie){
        $bdd = $this->connect();
        $req = $bdd->prepare("INSERT INTO categories(categorie) VALUE (?)");
        $req->execute(array($categorie));
    }

    public function modifArticle($idArticle){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT blog.id AS idArt,categorie,categories.id,image,descriptif_image,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie WHERE blog.id = ? ");
        $req->execute(array($idArticle));
        return $req->fetch();
    }

    public function updateArticle($idArticle,$descriptif,$titre,$texte,$categories){
        $bdd = $this->connect();
        // var_dump($categories);die;
        $req = $bdd->prepare("UPDATE blog SET descriptif_image = ? , titre = ?, texte = ?, id_categorie = ? WHERE id = ?");
        $req->execute(array($descriptif,$titre,$texte,$categories,$idArticle));
    }

    public function updateArticleImg($idArticle,$path,$descriptif,$titre,$texte,$categories){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE blog SET image = ? , descriptif_image = ? , titre = ?, texte = ?, id_categorie = ? WHERE id = ?");
        $req->execute(array($path,$descriptif,$titre,$texte,$categories,$idArticle));
    }

    public function supprimerArticle($idArticle){
        $bdd = $this->connect();
        $req = $bdd->prepare("DELETE FROM blog WHERE id = ?");
        $req->execute(array($idArticle));
    }
}

?>