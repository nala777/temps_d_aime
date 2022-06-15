<?php ob_start(); ?>
<main class="container">
    
    
    <div id="background_folio">
        <h1 id="titre_folio">Portfolio</h1>
        <ul id="filtre_folio" class="container">
            <li class="lien_filtre active" data-filter="All">All</li>
            <!-- boucle pour affichage catégories pour filtres en js -->
            <?php foreach($categories as $categorie){?>
                <li class="lien_filtre filtre_li" data-filter="<?= $categorie['nom']?>"><?= $categorie['nom']?></li>
            <?php }?>
        </ul>
        <div id="folio_accueil">
            <!-- affichage image portfolio -->
            <?php foreach($portfolio as $folio){?>
                <div class="filtre_image" data-filter="<?= $folio['nom']?>">
                    <img src="<?= $folio['image']?>" alt="<?= $folio['alt']?>">
                </div>
            <?php }?>
        </div>
    </div>
</main>
<script src="app/public/Front/js/categories.js"></script>
<?php $content = ob_get_clean(); ?>
<?php $title = "Portfolio" ?>
<?php require 'templates/template.php' ?>