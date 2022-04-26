<?php ob_start(); ?>

<main>
    <div>
        
            <div class="a_propos">
                <img class="img_propos" src="<?= ($proposAccueil['image']) ?>" alt="<?= ($proposAccueil['descriptif_image'])?>">
                <div id="filtre"></div>
                <div class="texte_propos">
                    <h2><?= ($proposAccueil['titre']) ?></h2>
                    <p><?= ($proposAccueil['texte'])?></p>
                </div>   
            </div>
    </div>

    <section id="services">
        <h1>Les services</h1>
            <?php foreach($servicesAccueil as $service){?>
                
                <article class="service slides fade">
                    <div class="logo">
                        <div class="image_logo">
                            <img src="<?= ($service['logo']) ?>" alt="<?= ($service['alt_logo'])?>">
                        </div>
                    </div>
                    <div class="info_service">
                        <h2><?= ($service['titre']) ?> </h2>
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
<script src="app\public\Front\js\slider_accueil.js"></script>
<?php $content = ob_get_clean(); ?>
<?php $title = "Accueil" ?>

<?php require 'templates/template.php' ?>
