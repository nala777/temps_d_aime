<?php ob_start(); ?>
<div class="container">
    <?php foreach($allPropos as $propos){ ?>
        <div class="a_propos">
            <img class="img_propos" src="<?= ($propos['image']) ?>" alt="<?= ($propos['descriptif_image'])?>">
            <div class="texte_propos">
                <h2><?= ($propos['titre']) ?></h2>
                <p><?= ($propos['texte'])?></p>
            </div>
        </div>
        <div class="tiret"></div>




    <?php } ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php $title = "A propos" ?>
<?php require 'templates/template.php' ?>

