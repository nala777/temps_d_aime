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
        $article = new \Projet\Models\BlogModel();
        
        
        
        $connexAdm = $userManager->recupMdp($mail, $mdp);

        $resultat = $connexAdm->fetch();
        if(!empty($result)){

            $isPasswordCorrect = password_verify($mdp, $resultat['mdp']);
            if ($isPasswordCorrect) {
                $_SESSION['mail'] = $resultat['mail']; // transformation des variables recupérées en session
                $_SESSION['mdp'] = $resultat['mdp'];
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['prenom'] = $resultat['prenom'];
                $_SESSION['nom'] = $resultat['nom'];


            
            
                $countContact = $contact->nbrContact();
                $countMail = $contact->nbrMail();
                $derniersArticles = $article->lastArticles();
            
                require 'app/views/Admin/dashboard.php';
            }else{
            echo 'Vos identifiants sont incorrect';
            //require('views/backend/erreur.php');
            }
        }else{
            echo 'mail non existant';
        }
    }
    
    // Traitement de fichiers images

    public function upload($file){
        $tmpName = $file['tmp_name'];
        $name = $file['name'];
        $size = $file['size'];
        $error = $file['error'];
        // Récupère extension du fichier
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        // Extensions Acceptées
        $extensions = ['jpg', 'png', 'jpeg', 'gif' , 'svg'];
        // Taille Image
        $maxSize = 4000000;
        
        if(in_array($extension, $extensions) && $size<= $maxSize && $error == 0){
            
            $path = 'app/public/Front/img/'.$name;
            move_uploaded_file($tmpName, $path);
            return $path;
        }else{
            echo "Une erreur est survenue";
        }
    }

    //                                         A Propos

    public function a_propos_admin(){
        $propos = new \Projet\Models\AProposModel();
        $allPropos = $propos->affichePropos();
        require "app/Views/Admin/a_propos_admin.php";
    }

    public function a_propos_modif($idPropos){
        $propos = new \Projet\Models\AProposModel();
        $modifP = $propos->propos($idPropos);
        require "app/Views/Admin/modif_a_propos.php";
    }

    public function updatePropos($idArticle,$descriptif,$titre,$texte){
        $propos = new \Projet\Models\AProposModel();
        $UpdateP = $propos->updatePropos($idArticle,$descriptif,$titre,$texte);
        $allPropos = $propos->affichePropos();
        require "app/Views/Admin/a_propos_admin.php";
    }

    public function updateProposImg($idArticle,$path,$descriptif,$titre,$texte){
        $propos = new \Projet\Models\AProposModel();
        $UpdateP = $propos->updateProposImg($idArticle,$path,$descriptif,$titre,$texte);
        $allPropos = $propos->affichePropos();
        require "app/Views/Admin/a_propos_admin.php";
    }

    //                                          Partie Services

    public function services_admin(){
        $services = new \Projet\Models\ServicesModel();
        $service = $services->afficheServices();
        require "app/Views/Admin/services_admin.php";
    }



    //                                          Partie BLOG

    // public function derniersArticles(){
    //     $articles = new \Projet\Models\BlogModel();
    //     $allArticles = $articles->lastArticles();
    //     require "app/Views/Front/a_propos.php";
    // }

    public function blog_admin()
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }

    // Ajouter nouvel article
    
    public function ajout_blog()
    {
        $article = new \Projet\Models\BlogModel();
        $categories = $article->afficheCategories();
        require "app/Views/Admin/ajout_blog.php";
    }

    public function ajout_categorie($categorie)
    {
        $article = new \Projet\Models\BlogModel();
        $categories = $article->ajoutCategorie($categorie);
        $categories = $article->afficheCategories();
        require "app/Views/Admin/ajout_blog.php";
    }

    public function upload_article($path,$descriptif,$titre,$texte,$categories)
    {
        $article = new \Projet\Models\BlogModel();
        $article->upload($path,$descriptif,$categories,$titre,$texte);   
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }

    // Update d'article

    public function modificationArticle($idArticle){
        $article = new \Projet\Models\BlogModel();
        $categories = $article->afficheCategories();
        $modif = $article->modifArticle($idArticle);
        require "app/Views/Admin/modif_article.php";
    }

    public function updateArticle($idArticle,$descriptif,$titre,$texte,$categories){
        $article = new \Projet\Models\BlogModel();
        $article->updateArticle($idArticle,$descriptif,$titre,$texte,$categories);
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";

    }

    public function updateArticleImg($idArticle,$path,$descriptif,$titre,$texte,$categories){
        $article = new \Projet\Models\BlogModel();
        $article->updateArticleImg($idArticle,$path,$descriptif,$titre,$texte,$categories);
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";

    }

    // Suppression Article

    public function suppressionArticle($idArticle)
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->supprimerArticle($idArticle);
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }

    //                                     Partie PORTFOLIO

    // Affichage Portfolio

    public function afficheFolio()
    {
        $folio = new \Projet\Models\PortfolioModel();
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        require "app/Views/Admin/portfolio_admin.php";
    }

    public function afficheFolioAccueil()
    {
        
        require "app/Views/Admin/portfolio_admin.php";
    }

    // Upload Portfolio
    
    public function ajoutFolio($path,$descriptif,$categories)
    {
        $folio = new \Projet\Models\PortfolioModel();
        $portfolio = $folio->ajoutPortfolio($path,$descriptif,$categories);
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        require "app/Views/Admin/portfolio_admin.php";

    }

    public function suppressionFolio($idFolio)
    {
        $folio = new \Projet\Models\PortfolioModel();
        $portfolio = $folio->supprFolio($idFolio);
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        
        require "app/Views/Admin/portfolio_admin.php";   
    }


}