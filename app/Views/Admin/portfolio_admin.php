<?php ob_start(); ?>
<main class="container">
    <h1>Modification Portfolio</h1>
    <form action="indexAdmin.php?action=ajout_folio" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input placeholder="Descriptif" name="descriptif" type="text" required autofocus>
        <select name="categories">
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['nom'] ?></option>
            <?php }?>
        </select>
        <button type="submit">Ajouter au Portfolio</button>
    </form>
    <div id="portfolio">
        <?php foreach($portfolio as $folio){ ?>
            <div class="">
                <img src="<?= $folio['image']?>" alt <?= $folio['alt']?>>
                <h4><?= $folio['nom']?></h4>
                <a href="indexAdmin.php?action=suppr_folio&id=<?=($folio['id'])?>">Supprimer</a>
            </div>
        <?php }?>
    </div>
    </main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Portfolio Admin" ?>
<?php require 'templates/template.php' ?>