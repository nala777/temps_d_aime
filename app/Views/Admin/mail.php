<?php ob_start(); ?>
<main class="container">
    <h1>Contenu du mail</h1>
    <div id="mail">
        
        <p>Reçu le : <?=$mail['created_at']?></p>
        <p>Envoyé par : <?=$mail['nom']?></p>
        <p>Email : <?=$mail['mail']?></p>
        <p>Titre : <?=$mail['sujet']?></p>
        <p>Contenu : <?=$mail['texte']?></p>
        <a href="indexAdmin.php?action=voirMails"><i class="fa-solid fa-arrow-left-long"></i> Retour sur les mails</a>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Page A Propos" ?>
<?php require 'templates/template.php' ?>