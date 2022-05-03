<?php ob_start(); ?>

<main>
    <div> 
        <div id="a_propos_accueil">
            <img id="img_propos_accueil" src="<?= ($proposAccueil['image']) ?>" alt="<?= ($proposAccueil['descriptif_image'])?>">
            <div id="filtre"></div>
            <div id="texte_propos_accueil">
                <h1><?= ($proposAccueil['titre']) ?></h1>
                <p><?= ($proposAccueil['texte'])?></p>
            </div>   
        </div>
    </div>

    <section id="services">
        <h2>Les services</h2>
            <?php foreach($servicesAccueil as $service){?>
                
                <article class="service slides">
                    <div class="logo">
                        <!-- <div class="image_logo"> -->
                            <img src="<?= ($service['logo']) ?>" alt="<?= ($service['alt_logo'])?>">
                        <!-- </div> -->
                    </div>
                    <div class="info_service">
                        <h3><?= ($service['titre']) ?> </h3>
                        <p><?= ($service['texte']) ?></p>
                    </div>  
                </article>
            
            <?php } ?>
        </div>
    </section>

    <section id="folio_accueil">
        <h2>Derniers Design</h2>
        <?php foreach($portfolio as $folio){?>
            <article class="container">
                <img src="<?= $folio['image']?>" alt="<?= $folio['alt']?>">
            </article>
        <?php }?>
    </section>

    <div id="container_formulaire_accueil">
        <div class="container">
            <h2>Travaillons ensemble</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque porttitor interdum ligula, eu hendrerit orci semper sed. Nam dignissim tortor sit amet neque blandit porttitor. Sed vitae viverra tellus. Nunc. </p>
            <form id="contact" action="index.php?action=accueilPost" method="post">
                <input aria-label="nom" placeholder="Votre nom" name="name" type="text" required autofocus>
                <input aria-label="email" placeholder="Votre Email" name="mail" type="mail" required>
                <input aria-label="Sujet" placeholder="Votre Sujet" name="subject" type="text" required>
                <textarea placeholder="Votre message" name="content" required></textarea>
                <button name="submit" type="submit" id="contact-submit">Envoyer</button>
            </form>
        </div>
    </div>


</main>
<script src="app\public\Front\js\slider_accueil.js"></script>
<?php $content = ob_get_clean(); ?>
<?php $title = "Accueil" ?>

<?php require 'templates/template.php' ?>
