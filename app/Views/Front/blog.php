<?php ob_start(); ?>
<main class="container">
    <div id="slider"></div>
    <section id="blog">
        <?php foreach($articles as $article){?>
            <article class="article">
                <img src="<?= ($article['image']) ?>" alt="<?= ($article['descriptif_image'])?>">
                <div class="info_article">
                    <p>Publié le <?= ($article['date']) ?> - <?= ($article['categorie']) ?></p>
                    <h2><?= ($article['titre']) ?></h2>
                </div>
            </article>
        
        <?php } ?>
    </section>

</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Blog" ?>
<?php require 'templates/template.php' ?>