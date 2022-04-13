<?php

namespace Projet\Controllers;

class FrontController
{
    function accueil()
    {
        $accueil = new \Projet\Models\AccueilModel();
        $proposAccueil = $accueil->afficheProposAccueil();
        $servicesAccueil = $accueil->afficheServicesAccueil();
        require "app/Views/Front/accueil.php";
    }

    function accueilPost($name, $mail, $subject, $content)
    {
        $accueil = new \Projet\Models\AccueilModel();

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail = $accueil->postMailAccueil($name, $mail,$subject, $content);
            $proposAccueil = $accueil->afficheProposAccueil();
            $servicesAccueil = $accueil->afficheServicesAccueil();
            require 'app/Views/Front/accueil.php';
        }else{
            header('Location: app/Views/Front/erreur.php');
        }
    }

    function aPropos()
    {
        $propos = new \Projet\Models\AProposModel();
        $allPropos = $propos->affichePropos();
        require "app/Views/Front/a_propos.php";
    }


    function services()
    {
        $services = new \Projet\Models\ServicesModel();
        $allServices = $services->afficheServices();
        require "app/Views/Front/services.php";
    }

    function portfolio()
    {
        require "app/Views/Front/portfolio.php";
    }

    function blog()
    {
        $article = new \Projet\Models\BlogModel();
        $articles = $article->afficheArticle();
        require "app/Views/Front/blog.php";
    } 

    function contact()
    {
        require "app/Views/Front/contact.php";
    }

    function contactPost($name, $mail, $subject, $content)
    {
        $postMail = new \Projet\Models\ContactModel();

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail = $postMail->postMail($name, $mail, $subject, $content);
            require 'app/Views/Front/contact.php';
        }else{
            header('Location: app/Views/Front/erreur.php');
        }
    }


}