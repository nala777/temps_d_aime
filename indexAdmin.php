<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


try {

    $backController = new \Projet\Controllers\AdminController();//objet controler

    
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'createAdmin'){ 
            // isConnect();
           
            $firstname = htmlspecialchars($_POST['firstname']);
            $lastname = htmlspecialchars($_POST['lastname']);
            $mail = htmlspecialchars($_POST['mail']);
            $pass = htmlspecialchars($_POST['password']);
            $mdp = password_hash($pass, PASSWORD_DEFAULT);
            $backController->createAdmin($firstname,$lastname,$mdp, $mail);

        }

        elseif ($_GET['action'] == 'connexionAdmin') { //connexion admin
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = htmlspecialchars($_POST['password']);
            if (!empty($mail) && !empty($mdp)) {
                $backController->connexion($mail, $mdp); // on passe deux paramètre
            } else {
                throw new Exception('renseigner vos identifiants');
            }
        }

        elseif ($_GET['action'] == 'deconnexion'){
            session_destroy();
            header('Location: index.php');
        }

        //          A PROPOS ADMIN

        elseif($_GET['action'] == 'a_propos_admin'){
            $backController->a_propos_admin();
        }

        elseif($_GET['action'] == 'modif_propos'){

            $idPropos = $_GET['id'];
            $backController->a_propos_modif($idPropos);

        }

        elseif($_GET['action'] == 'updatePropos'){

            $idArticle = $_GET['id'];
            $descriptif = htmlspecialchars($_POST['descriptif']);
            $titre = htmlspecialchars($_POST['titre']);
            $texte = htmlspecialchars($_POST['texte']);
            
            if(!empty($file) && (!empty($descriptif) && (!empty($titre) && (!empty($texte))))){
                $file = $_FILES['file'];
                $path=$backController->upload($file);
                $backController->updateProposImg($idArticle,$path,$descriptif,$titre,$texte); 

            }elseif((!empty($descriptif) && (!empty($titre) && (!empty($texte))))) {
                
                $backController->updatePropos($idArticle,$descriptif,$titre,$texte);

            
            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }

        //          BLOG ADMIN


        elseif($_GET['action'] == 'blog_admin'){
            $backController->blog_admin();
        }

        elseif($_GET['action'] == 'ajout_blog'){
            $backController->ajout_blog();
        }

        elseif($_GET['action'] == "upload_article"){
            $file = $_FILES['file'];
            $descriptif = htmlspecialchars($_POST['descriptif']);
            $titre = htmlspecialchars($_POST['titre']);
            $texte = htmlspecialchars($_POST['texte']);
            $categories = $_POST['categories'];
            if (!empty($file) && (!empty($descriptif) && (!empty($titre) && (!empty($texte) && (!empty($categories)))))) {
                $path=$backController->upload($file);
                $backController->upload_article($path,$descriptif,$titre,$texte,$categories);
            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
            
        }elseif($_GET['action'] == 'modif_article'){
            $idArticle = $_GET['id'];
            $backController->modificationArticle($idArticle);
        }

        elseif($_GET['action'] == 'updateArticle'){
            $idArticle = $_GET['id']; 
            $descriptif = htmlspecialchars($_POST['descriptif']);
            $titre = htmlspecialchars($_POST['titre']);
            $texte = htmlspecialchars($_POST['texte']);
            $categories = $_POST['categories'];
            
            if(!empty($file) && (!empty($descriptif) && (!empty($titre) && (!empty($texte) && (!empty($categories)))))){
                $file = $_FILES['file'];
                $path=$backController->upload($file);
                $backController->updateArticleImg($idArticle,$path,$descriptif,$titre,$texte,$categories);
                
            }elseif (!empty($descriptif) && (!empty($titre) && (!empty($texte) && (!empty($categories))))) {
    
                $backController->updateArticle($idArticle,$descriptif,$titre,$texte,$categories);

            }else{
                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }

        elseif($_GET['action'] == 'suppr_article'){
            $idArticle = $_GET['id'];
            $backController->supressionArticle($idArticle);
        }
    
    }else{
        $backController->connexionAdmin();
    }
}catch (Exception $e){
    require 'app/Views/Admin/erreur.php';
}catch (Error $e){
    require 'app/Views/Admin/erreur.php';
}



?>