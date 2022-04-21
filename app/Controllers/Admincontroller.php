<?php

namespace Projet\Controllers;

class AdminController
{
    // function dashboard()
    // {
    //     $contact = new \Projet\Models\ContactModel();
    //     $utilisateurs = new \Projet\Models\UtilisateursModel();

    //     $countContact = $contact->nbrContact();
    //     $countMail = $contact->nbrMail();
    //     $countUsers = $utilisateurs->nbrCompteUtilisateurs();
        
    //     require 'app/views/Admin/Dashboard.php';
    // }

    public function connexionAdmin(){
        require 'app\Views\Admin\connexion_admin.php';
    }

    function createAdmin($firstname,$lastname,$mdp, $mail)
    {
        $userManager = new \Projet\Models\AdminModel();
        $user = $userManager->creatAdmin($firstname,$lastname,$mdp, $mail);

        require 'app\Views\Admin\connexion_admin.php';

    }

    public function connexion($mail, $mdp)
    { //recup du mot de pass
        $userManager = new \Projet\Models\AdminModel();
        $contact = new \Projet\Models\ContactModel();
        $utilisateurs = new \Projet\Models\UtilisateursModel();
        $article = new \Projet\Models\BlogModel();
        
        
        
        $connexAdm = $userManager->recupMdp($mail, $mdp);

        $resultat = $connexAdm->fetch();

        $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);

        $_SESSION['mail'] = $resultat['mail']; // transformation des variables recupérées en session
        $_SESSION['mdp'] = $resultat['mdp'];
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['nom'] = $resultat['nom'];


        
        
        $countContact = $contact->nbrContact();
        $countMail = $contact->nbrMail();
        $countUsers = $utilisateurs->nbrCompteUtilisateurs();
        $derniersArticles = $article->lastArticles();
        if ($isPasswordCorrect) {

            require 'app/views/Admin/dashboard.php';
        } 
        
        else {
            echo 'Vos identifiants sont incorrect';
            //require('views/backend/erreur.php');
        }
    }

    public function derniersArticles(){
        $articles = new \Projet\Models\BlogModel();
        $allArticles = $articles->lastArticles();
        require "app/Views/Front/a_propos.php";
    }

    public function blog_admin()
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }
    public function upload_article($file,$descriptif,$titre,$texte,$categories)
    {
        $article = new \Projet\Models\BlogModel();
        $tmpName = $file['tmp_name'];
        $name = $file['name'];
        $size = $file['size'];
        $error = $file['error'];
        // Récupère extension du fichier
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        // Extensions Acceptées
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        // Taille Image
        $maxSize = 4000000;
        
        if(in_array($extension, $extensions) && $size<= $maxSize && $error == 0){
            
            $path = 'app/public/Front/img/'.$name;
            move_uploaded_file($tmpName, $path);
            $article->upload($path,$descriptif,$categories,$titre,$texte);   

        }else{
            echo "Une erreur est survenue";
        }
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }

    public function ajout_blog()
    {
        $article = new \Projet\Models\BlogModel();
        $categories = $article->afficheCategories();
        require "app/Views/Admin/ajout_blog.php";
    }

    public function modificationArticle($idArticle){
        $article = new \Projet\Models\BlogModel();
        $categories = $article->afficheCategories();
        $modif = $article->modifArticle($idArticle);
        require "app/Views/Admin/modif_article.php";
    }

    public function updateArticle($idArticle){
        
    }

    public function supressionArticle($idArticle)
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->supprimerArticle($idArticle);
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }


}