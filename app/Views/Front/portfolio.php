<?php ob_start(); ?>
<main>
    
    
    <div id="background_folio">
        <h1 class="container" id="titre_folio">Portfolio</h1>
        <ul id="filtre_folio" class="container">
            <li class="lien_filtre active" data-filter="All">All</li>
            <?php foreach($categories as $categorie){?>
                <li class="lien_filtre filtre_li" data-filter="<?= $categorie['nom']?>"><?= $categorie['nom']?></li>
            <?php }?>
        </ul>
        <section id="folio_accueil" class="container">
            
            <?php foreach($portfolio as $folio){?>
                <article class="filtre_image" data-filter="<?= $folio['nom']?>">
                    <img src="<?= $folio['image']?>" alt="<?= $folio['alt']?>">
                </article>
            <?php }?>
        </section>
</main>
<script src="app\public\Front\js\categories.js"></script>
<?php $content = ob_get_clean(); ?>
<?php $title = "Portfolio" ?>
<?php require 'templates/template.php' ?>