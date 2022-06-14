<?php ob_start(); ?>
<main class="container">
    <h1>Modification Portfolio</h1>
    <form class="formulaire" action="indexAdmin.php?action=ajout_folio" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input placeholder="Descriptif image" name="descriptif" type="text" required >
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
    </main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Portfolio Admin" ?>
<?php require 'templates/template.php' ?>