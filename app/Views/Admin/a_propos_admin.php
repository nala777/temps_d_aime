<?php ob_start(); ?>
<main class="container" id="propos">
    <!-- boucle affichage les éléments page à propos -->
    <?php foreach($allPropos as $propos){ ?>
        <div class="a_propos">
            <img class="img_propos" src="<?= ($propos['image']) ?>" alt="<?= ($propos['descriptif_image'])?>">
            <div class="texte_propos">
                <h2><?= ($propos['titre']) ?></h2>
                <p><?= ($propos['texte'])?></p>
            </div>
            <a title="modifier bloc" href="indexAdmin.php?action=modif_propos&id=<?=($propos['id'])?>" >Modifier</a>
        </div>
    <?php }?>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "A propos Admin" ?>
<?php require 'templates/template.php' ?>