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


        elseif($_GET['action'] == 'contactPost'){
            $name = htmlspecialchars($_POST['name']);
            $mail = htmlspecialchars($_POST['mail']);
            $subject = htmlspecialchars($_POST['subject']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($name) && (!empty($mail) && (!empty($subject) && (!empty($content))))) {
                $frontController->contactPost($name, $mail, $subject, $content);
            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        
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

    }else{
        $frontController->accueil();
    }
} catch(Exception $e){
    require 'app/Views/Front/erreur.php';
}catch(Error $e){
    require 'app/Views/Front/erreur.php';
}

?>