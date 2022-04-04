<?php

namespace Projet\Controllers;

class FrontController
{
    function accueil()
    {
        require "app/Views/Front/accueil.php";
    }

    function aPropos()
    {
        $propos = new \Projet\Models\AProposModel();
        $allPropos = $propos->affichePropos();
        require "app/Views/Front/a_propos.php";
    }


    function services()
    {
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
}