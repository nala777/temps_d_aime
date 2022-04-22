<?php ob_start(); ?>
<main class="container">

<h2>Bonjour <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> </h2>
    <div id="stats">
        
        <div class="stat">
            <div>
                <h3><?= $countContact['countContact'] ?> Nombre de contact</h3>
                <p><a href="#">Voir tout les contact</a></p>
            </div>
            <img src="app\public\Administration\img\contact.png">
        </div>
        <div class="stat">
            <div>
                <h3><?= $countMail['countMail'] ?> Mail Reçu</h3>
                <p><a href="#">Voir tout les mails</a></p>
            </div>
            <img src="app\public\Administration\img\mail.png">
        </div>
    </div>
    <h2>Derniers Articles</h2>
    <section id="articles">
        <?php foreach($derniersArticles as $article){ ?>
            <div class="article">
                <img class="img_article" src="<?= ($article['image']) ?>" alt="<?= ($article['descriptif_image'])?>">
                <div class="texte_article">
                    <p>Publié le <?= ($article['date']) ?> - <?= ($article['categorie']) ?></p>
                    <h4><?= ($article['titre']) ?></h4>
                </div>
            </div>
        <?php } ?>
    </section>
    
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "DashBoard" ?>
<?php require 'templates/template.php' ?>
