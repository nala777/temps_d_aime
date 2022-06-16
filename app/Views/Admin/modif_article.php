<?php ob_start(); ?>
<main class="container">
    <h1>Modification de l'article</h1>
    <!-- form update article blog -->
    <form class="formulaire" action="indexAdmin.php?action=updateArticle&id=<?= $modif['idArt'] ;?>" method="POST" enctype="multipart/form-data">
        <input aria-label="image" type="file" name="file" id="upload_image">
        <div id="preview">
            <img id="previewImage" src="#" alt="Preview Image">
        </div>
        <input aria-label="descriptif_image" placeholder="Descriptif image" value ="<?=$modif['descriptif_image']?>" name="descriptif" type="text" required >
        <input aria-label="titre_article" placeholder="Titre Article" value ="<?=$modif['titre']?>" name="titre" type="text" required >
        <textarea placeholder="Texte Article" name="texte" required><?=$modif['texte']?></textarea>
        <select name="categories" id="categories">
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['categorie'] ?></option>
            <?php }?>
                <option value="<?= $modif['id']?>" selected ><?= $modif['categorie'] ?></option>
        </select>
        <button type="submit">Modifier article</button>
    </form>
    <script src='app/public/Administration/js/preview_image.js'></script>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Article" ?>
<?php require 'templates/template.php' ?>