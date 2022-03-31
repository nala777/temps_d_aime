<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \Projet\Controllers\FrontController();

    if(isset($_GET['action'])){

        if($_GET['action'] == 'aPropos'){
            $frontController->aPropos();
        }

        elseif($_GET['action'] == 'services'){
            $frontController->services();
        }

        elseif($_GET['action'] == 'portfolio'){
            $frontController->portfolio();
        }

        elseif($_GET['action'] == 'blog'){
            $frontController->blog();
        }

        elseif($_GET['action'] == 'contact'){
            $frontController->contact();
        }
    }else{
        $frontController->accueil();
    }
} catch(Exception $e){
    require 'app/Views/Front/erreur.php';
}