<?php ob_start(); ?>

<main>
    <div>
        <?php foreach($proposAccueil as $propos){ ?>
            <div class="a_propos">
                <img class="img_propos" src="<?= ($propos['image']) ?>" alt="<?= ($propos['descriptif_image'])?>">
                <div class="texte_propos">
                    <h2><?= ($propos['titre']) ?></h2>
                    <p><?= ($propos['texte'])?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <section id="services">
        <h1>Les services Proposés</h1>
        <?php foreach($servicesAccueil as $service){?>
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
    <div id="container_formulaire">
        <h2>N'hésitez plus à me contacter</h2>
        <form id="contact" action="index.php?action=accueilPost" method="post">
            <input placeholder="Votre nom" name="name" type="text" required autofocus>
            <input placeholder="Votre Email" name="mail" type="mail" required>
            <input placeholder="Votre Sujet" name="subject" type="text" required>
            <textarea placeholder="Votre message" name="content" required></textarea>
            <button name="submit" type="submit" id="contact-submit">Envoyer</button>
        </form>

    </div>


</main>

<?php $content = ob_get_clean(); ?>
<?php $title = "Accueil" ?>
<?php require 'templates/template.php' ?>