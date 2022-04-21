<?php ob_start(); ?>
<main>
    <form action="indexAdmin.php?action=upload_article" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input placeholder="Descriptif" name="descriptif" type="text" required autofocus>
        <input placeholder="Titre Article" name="titre" type="text" required autofocus>
        <textarea placeholder="Texte Article" name="texte" type="text" required></textarea>
        <select name="categories" id="categories" required>
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['categorie'] ?></option>
            <?php }?>
        </select>
        <button type="submit">Ajouter article</button>
    </form>
    <img id="output"/>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Ajouter Article" ?>
<script type='text/javascript' src='app\public\Administration\js\imagePreview.js'></script>
<?php require 'templates/template.php' ?>