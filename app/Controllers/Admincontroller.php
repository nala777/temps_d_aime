<?php

namespace Projet\Controllers;

class AdminController
{
    function dashboard()
    {
        require 'app/views/Admin/Dashboard.php';
    }

    function aPropos()
    {
        $propos = new \Projet\Models\AProposModel();
        $allPropos = $propos->affichePropos();
        require "app/Views/Front/a_propos.php";
    }
}