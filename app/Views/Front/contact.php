<?php ob_start(); ?>
<main>
    <div id="container_formulaire">
        <h2>N'hésitez plus à me contacter</h2>
        <form id="contact" action="index.php?action=contactPost" method="post">
            <input placeholder="Votre nom" name="name" type="text" required autofocus>
            <input placeholder="Votre Email" name="mail" type="mail" required>
            <input placeholder="Votre Sujet" name="subject" type="text" required>
            <textarea placeholder="Votre message" name="content" required></textarea>
            <button name="submit" type="submit" id="contact-submit">Envoyer</button>
        </form>

    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Contact" ?>
<?php require 'templates/template.php' ?>