<?php ob_start(); ?>
<main>
    <h1>erreur</h1>
    <?= $e ?>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Erreur" ?>
<?php require 'templates/template.php' ?>