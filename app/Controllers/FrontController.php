<?php

namespace Projet\Controllers;

class FrontController
{
    public function accueil()
    {   
        $propos = new \Projet\Models\AProposModel();
        $servicesAccueil = new \Projet\Models\ServicesModel();
        $folio = new \Projet\Models\PortfolioModel();
        
        $proposAccueil = $propos->afficheProposAccueil();
        $servicesAccueil = $servicesAccueil->afficheServicesAccueil();
        $portfolio = $folio->afficheFolioAccueil();
        require "app/Views/Front/accueil.php";
    }

    public function accueilPost($name, $mail, $subject, $content)
    {
        $accueil = new \Projet\Models\AccueilModel();
        $propos = new \Projet\Models\AProposModel();
        $servicesAccueil = new \Projet\Models\ServicesModel();
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail = $accueil->postMailAccueil($name, $mail,$subject, $content);
            $proposAccueil = $propos->afficheProposAccueil();
            $servicesAccueil = $servicesAccueil->afficheServicesAccueil();
            require 'app/Views/Front/accueil.php';
        }else{
            header('Location: app/Views/Front/erreur.php');
        }
    }

    public function aPropos()
    {
        $propos = new \Projet\Models\AProposModel();
        $allPropos = $propos->affichePropos();
        require "app/Views/Front/a_propos.php";
    }


    public function services()
    {
        $services = new \Projet\Models\ServicesModel();
        $allServices = $services->afficheServices();
        require "app/Views/Front/services.php";
    }

    public function portfolio()
    {
        $folio = new \Projet\Models\PortfolioModel();
        $categories = $folio->afficheCategories();
        $portfolio = $folio->afficheFolio();
        require "app/Views/Front/portfolio.php";
    }

    public function blog()
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->afficheArticle();
        require "app/Views/Front/blog.php";
    }
    
    public function article($idArticle)
    {
        $article = new \Projet\Models\BlogModel();
        $articleSimple = $article->article($idArticle);
        require "app/Views/Front/article.php";
    }

    public function mentionsLegales()
    {
        require "app/Views/Front/mentions_legales.php";
    }

}