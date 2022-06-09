<?php ob_start(); ?>
<main class="container">
    <section id="blog">
        <?php foreach($articles as $article){?>
            <article class="article">
                <img src="<?= ($article['image']) ?>" alt="<?= ($article['descriptif_image'])?>">
                <div class="info_article article_blog">
                    <h2><?= ($article['titre']) ?></h2>
                    <p>Publié le <?= ($article['date']) ?></p>
                    <p>Catégorie : <?= ($article['categorie']) ?></p>  
                </div>
                <a href="index.php?action=article&id=<?=($article['id'])?>" class="lire">Lire l'article</a>
            </article>   
        <?php } ?>
    </section>

</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Blog" ?>
<?php require 'templates/template.php' ?>