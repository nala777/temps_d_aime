<?php ob_start(); ?>
<main class="container">
    <div id="oneArticle">
        <img src="<?= ($articleSimple['image']) ?>" alt="<?= ($articleSimple['descriptif_image'])?>">
        <div class="info_article">
            
            <h1><?= ($articleSimple['titre']) ?></h1>
            <p>Catégorie : <?= ($articleSimple['categorie']) ?></p>
            <p>Publié le <?= ($articleSimple['date']) ?></p>
            <p><?= ($articleSimple['texte']) ?></p>
            <a title="Revenir aux articles" href="index.php?action=blog"><i class="fa-solid fa-arrow-left-long"></i> Revenir aux articles</a>
        </div>
        
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Blog" ?>
<?php require 'templates/template.php' ?>