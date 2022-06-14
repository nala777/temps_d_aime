<?php ob_start(); ?>
<h1>Erreur</h1>
<?= $e ?>
<?php $content = ob_get_clean(); ?>
<?php $title = "Page 404" ?>
<?php require 'templates/template.php' ?>