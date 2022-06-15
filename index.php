<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try{
    $frontController = new \Projet\Controllers\FrontController();

    if(isset($_GET['action'])){
        // affichage page a propos

        if($_GET['action'] == 'aPropos'){
            $frontController->aPropos();
        }

        // affichage portfolio
        elseif($_GET['action'] == 'portfolio'){
            $frontController->portfolio();
        }

        // affichage blog
        elseif($_GET['action'] == 'blog'){
            $frontController->blog();
        }

        // affichage d'un article
        elseif($_GET['action'] == 'article'){
            $idArticle = $_GET['id'];
            $frontController->article($idArticle);
        }
        
        // récupération des données pour envoie formulaire contact
        elseif($_GET['action'] == 'accueilPost'){
            $name = htmlspecialchars($_POST['name']);
            $mail = htmlspecialchars($_POST['mail']);
            $subject = htmlspecialchars($_POST['subject']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($name) && (!empty($mail) && (!empty($subject) && (!empty($content))))) {
                $frontController->accueilPost($name, $mail, $subject, $content);
            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }

        // affichage mentions légales
        elseif($_GET['action'] == 'mentionsLegales'){
            $frontController->mentionsLegales();
        }

        else{
            throw new Exception();
        }

    }else{
        $frontController->accueil();
    }
} catch(Exception $e){
    require 'app/Views/Front/404.php';
}catch(Error $e){
    require 'app/Views/Front/404.php';
}

?>