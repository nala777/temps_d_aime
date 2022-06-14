<?php ob_start(); ?>
<main class="container">
    <h1 id="titre_form">Ajout d'un article</h1>
    <form class="formulaire" action="indexAdmin.php?action=upload_article" method="POST" enctype="multipart/form-data">
        <input aria-label="image" type="file" name="file" required>
        <input aria-label="descriptif_image" placeholder="Descriptif image" name="descriptif" type="text" required>
        <input aria-label="titre_article" placeholder="Titre Article" name="titre" type="text" required>
        <select name="categories" id="categories">
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['categorie'] ?></option>
            <?php }?>
        </select>
        <textarea placeholder="Texte Article" name="texte" required></textarea>
        <button type="submit">Ajouter article</button>
    </form>
    <form class="formulaire" id="categorie" action ="indexAdmin.php?action=ajout_categorie" method="POST" enctype="multipart/form-data">
        <input aria-label="categorie" id="input_categorie" placeholder="Catégorie" name="categorie" type="text" required>
        <button id="button_categorie" type="submit">Ajouter une catégorie</button>
    </form>
    <img id="output"/>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Ajouter Article" ?>
<script type='text/javascript' src='app\public\Administration\js\imagePreview.js'></script>
<?php require 'templates/template.php' ?>