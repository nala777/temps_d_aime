<?php ob_start(); ?>
<h1>Erreur</h1>
<?php $content = ob_get_clean(); ?>
<?php $title = "Erreur" ?>
<?php require 'templates/template.php' ?>