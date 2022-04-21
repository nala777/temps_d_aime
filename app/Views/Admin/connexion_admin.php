<?php ob_start(); ?>
<main>
    <form id="contact" action="indexAdmin.php?action=connexionAdmin" method="post">
        <input placeholder="Mail" name="mail" type="text" required autofocus>
        <input placeholder="Votre Mdp" name="password" type="password" required>
        <button name="submit" type="submit" id="connexion-submit">Envoyer</button>
    </form>

    <form id="contact" action="indexAdmin.php?action=createAdmin" method="post">
        <input placeholder="Votre Prenom" name="firstname" type="text" required autofocus>
        <input placeholder="Votre nom" name="lastname" type="text" required>
        <input placeholder="Votre Email" name="mail" type="mail" required>
        <input placeholder="Votre Mdp" name="password" type="password" required>
        <button name="submit" type="submit" id="create-admin">Envoyer</button>
    </form>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Connexion Admin" ?>
<?php require 'templates/template.php' ?>