<?php

namespace Projet\Models;

class BlogModel extends TempsDaimeOrm
{
    // affiche de tout les articles
    public function afficheArticle()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT blog.id,categorie,image,descriptif_image, DATE_FORMAT(date_article, '%d/%m/%Y') AS date,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie ORDER BY blog.id DESC ");

        return $req;
    }

    // affiche un article
    public function article($idArticle)
    {
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT categorie,image,descriptif_image,DATE_FORMAT(date_article, '%d/%m/%Y') AS date,titre,texte FROM blog , categories WHERE categories.id = blog.id_categorie AND blog.id = ?");
        $req->execute(array($idArticle));
        return $req->fetch(); 
    }

    // affichage des 3 derniers articles
    public function lastArticles()
    {
        $bdd = $this->connect();
        $req = $bdd->query("SELECT categorie,image,descriptif_image, DATE_FORMAT(date_article, '%d/%m/%Y') AS date,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie ORDER BY blog.id DESC LIMIT 3");
        return $req;
    }

    // affiche les différentes catégories
    public function afficheCategories(){
        $bdd = $this->connect();
        $req = $bdd->query("SELECT categorie,id FROM categories");
        return $req;
    }

    // envoie en bdd nouvelle article
    public function upload($data){
        $bdd = $this->connect();
        $req = $bdd->prepare("INSERT INTO blog (image,descriptif_image,id_categorie,titre,texte) VALUE (:image,:descriptif,:categorie,:titre,:texte)");
        $req->execute(array(
            ":image" => $data['image'],
            ":descriptif" => $data['descriptif'],
            ":titre" => $data['titre'],
            ":texte" => $data['texte'],
            ":categorie" => $data['categorie'],
            ":id" => $data['id']
        ));
    }

    // ajouter une nouvelle catégorie
    public function ajoutCategorie($categorie){
        $bdd = $this->connect();
        $req = $bdd->prepare("INSERT INTO categories(categorie) VALUE (?)");
        $req->execute(array($categorie));
    }

    // select pour pré-remplir formulaire update d'un article
    public function modifArticle($idArticle){
        $bdd = $this->connect();
        $req = $bdd->prepare("SELECT blog.id AS idArt,categorie,categories.id,image,descriptif_image,titre,texte FROM blog INNER JOIN categories ON categories.id = blog.id_categorie WHERE blog.id = ? ");
        $req->execute(array($idArticle));
        return $req->fetch();
    }

    // update d'un article sans image
    public function updateArticle($data){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE blog SET descriptif_image = :descriptif  , titre = :titre, texte = :texte, id_categorie = :categorie WHERE id = :id");
        $req->execute(array(
            ":descriptif" => $data['descriptif'],
            ":titre" => $data['titre'],
            ":texte" => $data['texte'],
            ":categorie" => $data['categorie'],
            ":id" => $data['id']
        ));
    }

    // update d'un article avec image
    public function updateArticleImg($data){
        $bdd = $this->connect();
        $req = $bdd->prepare("UPDATE blog SET image = :image , descriptif_image = :descriptif , titre = :titre, texte = :texte, id_categorie = :categorie WHERE id = :id");
        $req->execute(array(
            ":image" => $data['image'],
            ":descriptif" => $data['descriptif'],
            ":titre" => $data['titre'],
            ":texte" => $data['texte'],
            ":categorie" => $data['categorie'],
            ":id" => $data['id']
        ));
    }

    // suppression d'un article
    public function supprimerArticle($idArticle){
        $bdd = $this->connect();
        $req = $bdd->prepare("DELETE FROM blog WHERE id = ?");
        $req->execute(array($idArticle));
    }
}

?>