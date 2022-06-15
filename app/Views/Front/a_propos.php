<?php ob_start(); ?>
<main>
    <h1 id=titre_propos>A propos de moi</h1>
    <div id="bloc_propos">
        <!-- boucle affichage propos -->
        <?php foreach($allPropos as $propos){ ?>
            <div class="a_propos">
                <img class="img_propos" src="<?= ($propos['image']) ?>" alt="<?= ($propos['descriptif_image'])?>">
                <div class="filtre"></div>
                <div class="texte_propos">
                    <h2><?= ($propos['titre']) ?></h2>
                    <p><?= ($propos['texte'])?></p>
                </div>
            </div>
            <div class="tiret"><img src="app/public/Front/img/SVG/line.svg" alt="tiret"></div>
        <?php } ?>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "A propos" ?>
<?php require 'templates/template.php' ?>

