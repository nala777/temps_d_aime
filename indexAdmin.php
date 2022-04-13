<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {

    $backController = new \Projet\Controllers\AdminController();//objet controler

    
    if (isset($_GET['action'])) {

        if($GET['action']){}
    
    }else{
        $backController->dashboard();
    }
}catch (Exception $e){
    require 'app/Views/Front/erreur.php';;
}



?>