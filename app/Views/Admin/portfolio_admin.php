<?php ob_start(); ?>
<main class="container">
    <h1>Modification Portfolio</h1>
    <form class="formulaire" action="indexAdmin.php?action=ajout_folio" method="POST" enctype="multipart/form-data">
        <input aria-label="image" type="file" name="file" id="upload_image" required>
        <div id="preview">
            <img id="previewImage" src="#" alt="Preview Image">
        </div>
        <input aria-label="descriptif_image" placeholder="Descriptif image" name="descriptif" type="text" required >
        <select name="categories">
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['nom'] ?></option>
            <?php }?>
        </select>
        <button type="submit">Ajouter au Portfolio</button>
    </form>
    <div id="portfolio">
        <?php foreach($portfolio as $folio){ ?>
            <div class="image_folio">
                <img src="<?= $folio['image']?>" alt="<?= $folio['alt']?>">
                <h2>Catégorie - <?= $folio['nom']?></h2>
                <a title="Supprimer du folio"  class="button folio_button" href="indexAdmin.php?action=suppr_folio&id=<?=($folio['id'])?>">Supprimer</a>
            </div>
        <?php }?>
    </div>
    <script src='app/public/Administration/js/preview_image.js'></script>
    </main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Admin" ?>
<?php require 'templates/template.php' ?>