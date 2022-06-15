<?php

namespace Projet\Controllers;
// Tout ce qui concerne le côté admin 
class AdminController
{
    // page connexion Admin
    public function connexionAdmin(){
        require 'app\Views\Admin\connexion_admin.php';
    }

    // Créer compte admin
    function createAdmin($firstname,$lastname,$mdp, $mail)
    {
        $userManager = new \Projet\Models\AdminModel();
        $user = $userManager->creatAdmin($firstname,$lastname,$mdp, $mail);

        require 'app\Views\Admin\connexion_admin.php';

    }

    // verif mot de passe pour connexion
    public function connexion($mail, $mdp)
    { //recup du mot de passe
        $userManager = new \Projet\Models\AdminModel();
        $contact = new \Projet\Models\ContactModel();
        $article = new \Projet\Models\BlogModel();
        
        
        $erreur = [];
        $connexAdm = $userManager->recupMdp($mail, $mdp);

        $resultat = $connexAdm->fetch();
        if(!empty($resultat)){

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
                $erreur[] = "Vos identifiants sont incorrect";
                require 'app/Views/Admin/connexion_admin.php';
                return $erreur;
            //require('views/backend/erreur.php');
            }
        }else{
            $erreur[] = "Vos identifiants sont incorrect";
            require 'app/Views/Admin/connexion_admin.php';
            return $erreur;
        }
    }

    
    
    // Traitement de fichiers images ainsi que pour envoyer dans le dossier dédié aux images

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

    // affichage dashboard
    public function dashboard(){
        $contact = new \Projet\Models\ContactModel();
        $article = new \Projet\Models\BlogModel();
        $countContact = $contact->nbrContact();
        $countMail = $contact->nbrMail();
        $derniersArticles = $article->lastArticles();
            
        require 'app/views/Admin/dashboard.php';
    }
    // affichage carnet d'addresse
    public function voirContact(){
        $contact = new \Projet\Models\ContactModel();
        $contacts = $contact->voirContact();

        require 'app/Views/Admin/contact.php';
    }
    // liste des mails reçu
    public function voirMails(){
        $contact = new \Projet\Models\ContactModel();
        $mails = $contact->voirMails();

        require 'app/Views/Admin/mails.php';
    }
    // affichage d'un mail
    public function voirMail($idMail){
        $contact = new \Projet\Models\ContactModel();
        $mail = $contact->voirMail($idMail);

        require 'app/Views/Admin/mail.php';
    }
    // delete un mail
    public function deleteMail($idMail){

        $contact = new \Projet\Models\ContactModel();
        $mails = $contact->deleteMail($idMail);
        $mails = $contact->voirMails();

        require 'app/Views/Admin/mails.php';
    }

    //                                         A Propos

    // affichage page a propos admin
    public function a_propos_admin(){
        $propos = new \Projet\Models\AProposModel();
        $allPropos = $propos->affichePropos();
        require "app/Views/Admin/a_propos_admin.php";
    }
    // formulaire pour modifier un élément a propos
    public function a_propos_modif($idPropos){
        $propos = new \Projet\Models\AProposModel();
        $modifP = $propos->propos($idPropos);
        if(isset($modifP['id'])){
            require "app/Views/Admin/modif_a_propos.php";
        }else{
            throw new Exception();
        }
    }
    // envoie formulaire update un élément de a propos sans image
    public function updatePropos($data){
        $propos = new \Projet\Models\AProposModel();
        $UpdateP = $propos->updatePropos($data);
        $allPropos = $propos->affichePropos();
        require "app/Views/Admin/a_propos_admin.php";
    }
    // envoie formulaire update un élément de a propos avec image
    public function updateProposImg($data){
        $propos = new \Projet\Models\AProposModel();
        $UpdateP = $propos->updateProposImg($data);
        $allPropos = $propos->affichePropos();
        require "app/Views/Admin/a_propos_admin.php";
    }

    //                                          Partie BLOG

    // public function derniersArticles(){
    //     $articles = new \Projet\Models\BlogModel();
    //     $allArticles = $articles->lastArticles();
    //     require "app/Views/Front/a_propos.php";
    // }

    // affichage page blog
    public function blog_admin()
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }

    // Formulaire Ajouter nouvel article
    
    public function ajout_blog()
    {
        $article = new \Projet\Models\BlogModel();
        $categories = $article->afficheCategories();
        require "app/Views/Admin/ajout_blog.php";
    }
    // ajout nouvelle catégorie pour article blog
    public function ajout_categorie($categorie)
    {
        $article = new \Projet\Models\BlogModel();
        $categories = $article->ajoutCategorie($categorie);
        $categories = $article->afficheCategories();
        require "app/Views/Admin/ajout_blog.php";
    }

    // envoie formulaire pour ajout article
    public function upload_article($data)
    {
        $article = new \Projet\Models\BlogModel();
        $article->upload($data);   
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";
    }

    // Update d'article affichage formulaire

    public function modificationArticle($idArticle){
        $article = new \Projet\Models\BlogModel();
        $categories = $article->afficheCategories();
        $modif = $article->modifArticle($idArticle);
        require "app/Views/Admin/modif_article.php";
    }
    // envoie formulaire update article sans image
    public function updateArticle($data){
        $article = new \Projet\Models\BlogModel();
        $article->updateArticle($data);
        $articles = $article->afficheArticle();
        require "app/Views/Admin/blog_admin.php";

    }
    // envoie formulaire update article avec image
    public function updateArticleImg($data){
        $article = new \Projet\Models\BlogModel();
        $article->updateArticleImg($data);
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

    // Affichage Portfolio admin

    public function afficheFolio()
    {
        $folio = new \Projet\Models\PortfolioModel();
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        require "app/Views/Admin/portfolio_admin.php";
    }

    // public function afficheFolioAccueil()
    // {
        
    //     require "app/Views/Admin/portfolio_admin.php";
    // }

    // Upload sur Portfolio
    
    public function ajoutFolio($path,$descriptif,$categories)
    {
        $folio = new \Projet\Models\PortfolioModel();
        $portfolio = $folio->ajoutPortfolio($path,$descriptif,$categories);
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        require "app/Views/Admin/portfolio_admin.php";

    }
    // suppression du portfolio
    public function suppressionFolio($idFolio)
    {
        $folio = new \Projet\Models\PortfolioModel();
        $portfolio = $folio->supprFolio($idFolio);
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        
        require "app/Views/Admin/portfolio_admin.php";   
    }
}

