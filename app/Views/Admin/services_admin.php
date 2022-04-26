<?php ob_start(); ?>
<main>
<section id="services" class="container">
        <h1>Modifier Services</h1>
        <?php foreach($service as $services){?>
            <article class="service">

                <div class="logo">
                    <!-- <div class="image_logo"> -->
                        <img src="<?= ($services['logo']) ?>" alt="<?= ($services['alt_logo'])?>">
                    <!-- </div> -->
                </div>
                <div class="info_service">
                    <h2><?= ($services['titre']) ?> </h2>
                    <p><?= ($services['texte']) ?></p>
                </div>
                
            </article>
        <?php } ?>
    </section>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "A propos Services" ?>
<?php require 'templates/template.php' ?>