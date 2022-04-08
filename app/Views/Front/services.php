<?php ob_start(); ?>
<main>
    
    <section id="services">
        <h1>Les services Proposés</h1>
        <?php foreach($allServices as $service){?>
            <article class="service">

                <div class="logo">
                    <!-- <div class="image_logo"> -->
                        <img src="<?= ($service['logo']) ?>" alt="<?= ($service['alt_logo'])?>">
                    <!-- </div> -->
                </div>
                <div class="info_service">
                    <h2><?= ($service['titre']) ?> </h2>
                    <p><?= ($service['texte']) ?></p>
                </div>
                
            </article>
        <?php } ?>
    </section>
</main>

<?php $content = ob_get_clean(); ?>
<?php $title = "Services" ?>
<?php require 'templates/template.php' ?>