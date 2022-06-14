<?php ob_start(); ?>
<main class="container">

<h1>Bonjour <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> </h1>
    <div id="stats">
        
        <div class="stat">
            <div class="stat_info">
                <h2><?= $countContact['countContact'] ?> Contacts</h2>
                <p><a title="Voir contacts"  href="indexAdmin.php?action=voirContact">Voir tout les contact</a></p>
            </div>
            <img src="app/public/Administration/img/contact.png" alt="contact">
        </div>
        <div class="stat">
            <div class="stat_info">
                <h2><?= $countMail['countMail'] ?> Mails Reçu</h2>
                <a title="Voir les mails"  href="indexAdmin.php?action=voirMails">Voir tout les mails</a>
            </div>
            <img src="app/public/Administration/img/mail.png" alt="mail">
        </div>
    </div>
    <section id="blog">
        <h2 id="section_blog">Derniers Articles</h2>
        <?php foreach($derniersArticles as $article){ ?>
            <article class="article">
                <img src="<?= ($article['image']) ?>" alt="<?= ($article['descriptif_image'])?>">
                <div class="info_article article_blog">
                    <h2><?= ($article['titre']) ?></h2>
                    <p>Publié le <?= ($article['date']) ?></p>
                    <p>Catégorie : <?= ($article['categorie']) ?></p>  
                </div>
            </article>
        <?php } ?>
    </section>
    
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "DashBoard" ?>
<?php require 'templates/template.php' ?>
