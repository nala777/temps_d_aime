<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


try {

    $backController = new \Projet\Controllers\AdminController();//objet controler

    
        if (isset($_GET['action'])) {
            // création admin
            if ($_GET['action'] == 'createAdmin'){ 
                // isConnect();
            
                $firstname = htmlspecialchars($_POST['firstname']);
                $lastname = htmlspecialchars($_POST['lastname']);
                $mail = htmlspecialchars($_POST['mail']);
                $pass = htmlspecialchars($_POST['password']);
                $mdp = password_hash($pass, PASSWORD_DEFAULT);
                $backController->createAdmin($firstname,$lastname,$mdp, $mail);

            }

            // connexion admin
            elseif ($_GET['action'] == 'connexionAdmin') { //connexion admin
                $mail = htmlspecialchars($_POST['mail']);
                $mdp = htmlspecialchars($_POST['password']);
                if (!empty($mail) && !empty($mdp)) {
                    $backController->connexion($mail, $mdp); // on passe deux paramètre
                } else {
                    throw new Exception('renseigner vos identifiants');
                }
            }

            // deconnexion du compte
            elseif ($_GET['action'] == 'deconnexion'){
                session_destroy();
                header('Location: index.php');
            }

            // vérification d'une connexion pour avoir accès au côté admin
            if(isset($_SESSION['id'])){

                    // affichage dashboard
                    if ($_GET['action'] == 'dashboard') {
                        $backController->dashboard();
                    }

                    //Voir contact/mail

                    elseif ($_GET['action'] == 'voirContact') {
                        $backController->voirContact();
                    }

                    elseif ($_GET['action'] == 'voirMails') {
                        $backController->voirMails();
                    }

                    elseif ($_GET['action'] == 'voirMail') {
                        $idMail = $_GET['id'];
                        $backController->voirMail($idMail);
                    }

                    elseif ($_GET['action'] == 'deleteMail') {
                        $idMail = $_GET['id'];
                        $backController->deleteMail($idMail);
                    }
                    
                    //          A PROPOS ADMIN

                    elseif($_GET['action'] == 'a_propos_admin'){
                        $backController->a_propos_admin();
                    }

                    // formulaire update a propos
                    elseif($_GET['action'] == 'modif_propos'){

                        $idPropos = $_GET['id'];
                        $backController->a_propos_modif($idPropos);

                    }

                    // envoie form update a propos 
                    elseif($_GET['action'] == 'updatePropos'){

                        $idArticle = $_GET['id'];
                        $descriptif = htmlspecialchars($_POST['descriptif']);
                        $titre = htmlspecialchars($_POST['titre']);
                        $texte = htmlspecialchars($_POST['texte']);
                        
                        if(!empty($file) && (!empty($descriptif) && (!empty($titre) && (!empty($texte))))){
                            $file = $_FILES['file'];
                            $path=$backController->upload($file);
                            $data = [
                                "id" => $idArticle,
                                "image" => $path,
                                "descriptif" => $descriptif,
                                "titre" => $titre,
                                "texte" => $texte
                            ];
                            $backController->updateProposImg($data); 

                        }elseif((!empty($descriptif) && (!empty($titre) && (!empty($texte))))) {
                            $data = [
                                "id" => $idArticle,
                                "descriptif" => $descriptif,
                                "titre" => $titre,
                                "texte" => $texte
                            ];
                            $backController->updatePropos($data);

                        
                        }else{
                            throw new Exception('Tous les champs ne sont pas remplis');
                        }
                    }

                    //          BLOG ADMIN

                    // affichage page blog admin
                    elseif($_GET['action'] == 'blog_admin'){
                        $backController->blog_admin();
                    }

                    // form ajout au blog article
                    elseif($_GET['action'] == 'ajout_blog'){
                        $backController->ajout_blog();
                    }

                    // d'une nouvelle catégorie
                    elseif($_GET['action'] == 'ajout_categorie'){
                        $categorie = htmlspecialchars($_POST['categorie']);
                        $backController->ajout_categorie($categorie);
                        var_dump($categorie);die;
                    }

                    // envoie form nouvel article
                    elseif($_GET['action'] == "upload_article"){
                        $file = $_FILES['file'];
                        $descriptif = htmlspecialchars($_POST['descriptif']);
                        $titre = htmlspecialchars($_POST['titre']);
                        $texte = htmlspecialchars($_POST['texte']);
                        $categories = $_POST['categories'];
                        if (!empty($file) && (!empty($descriptif) && (!empty($titre) && (!empty($texte) && (!empty($categories)))))) {
                            $path=$backController->upload($file);
                            $data = [
                                "id" => $idArticle,
                                "image" => $path,
                                "descriptif" => $descriptif,
                                "categorie" => $categories,
                                "titre" => $titre,
                                "texte" => $texte
                            ];
                            $backController->upload_article($data);
                        }else{
                            throw new Exception('Tous les champs ne sont pas remplis');
                        }
                        
                    // affichage form update d'un article
                    }elseif($_GET['action'] == 'modif_article'){
                        $idArticle = $_GET['id'];
                        $backController->modificationArticle($idArticle);
                    }
                    
                    // envoie form update article blog
                    elseif($_GET['action'] == 'updateArticle'){
                        $idArticle = $_GET['id']; 
                        $descriptif = htmlspecialchars($_POST['descriptif']);
                        $titre = htmlspecialchars($_POST['titre']);
                        $texte = htmlspecialchars($_POST['texte']);
                        $categories = $_POST['categories'];
                        
                        if(!empty($file) && (!empty($descriptif) && (!empty($titre) && (!empty($texte) && (!empty($categories)))))){
                            $file = $_FILES['file'];
                            $path=$backController->upload($file);
                            $data = [
                                "id" => $idArticle,
                                "image" => $path,
                                "descriptif" => $descriptif,
                                "titre" => $titre,
                                "categorie" => $categories,
                                "texte" => $texte
                            ];
                            $backController->updateArticleImg($data);
                            
                        }elseif (!empty($descriptif) && (!empty($titre) && (!empty($texte) && (!empty($categories))))) {
                            $data = [
                                "id" => $idArticle,
                                "descriptif" => $descriptif,
                                "titre" => $titre,
                                "categorie" => $categories,
                                "texte" => $texte
                            ];
                            $backController->updateArticle($data);

                        }else{
                            throw new Exception('Tous les champs ne sont pas remplis');
                        }
                    }

                    // suppression article blog
                    elseif($_GET['action'] == 'suppr_article'){
                        $idArticle = $_GET['id'];
                        $backController->suppressionArticle($idArticle);
                    }

                    // affichage page folio admin
                    elseif($_GET['action'] == 'portfolio_admin'){
                        $backController->afficheFolio();
                    }

                    // envoie form ajout folio
                    elseif($_GET['action'] == 'ajout_folio'){
                        $file = $_FILES['file'];
                        $descriptif = htmlspecialchars($_POST['descriptif']);
                        $categories = $_POST['categories'];
                        if (!empty($file) && (!empty($descriptif) && (!empty($categories)))) {
                            $path = $backController->upload($file);
                            $backController->ajoutFolio($path,$descriptif,$categories);
                        }else{
                            throw new Exception('Tous les champs ne sont pas remplis');
                        }
                    }

                    // suppression du portfolio
                    elseif($_GET['action'] == 'suppr_folio'){
                        $idFolio = $_GET['id'];
                        $backController->suppressionFolio($idFolio);
                    }

        
                
            }else{
                throw new Exception("Vous n'êtes pas administrateur");    
            }
            
    }else{
        // page connexion admin
        $backController->connexionAdmin();
    }
}catch (Exception $e){
    require 'app/Views/Admin/404.php';
}catch (Error $e){
    require 'app/Views/Admin/404.php';
}



?>