<?php ob_start(); ?>
<body class="container">
    <div id="slider"></div>
    <section id="blog">
        <?php foreach($articles as $article){?>
            <article class="article">
                <img src="<?= ($article['image']) ?>" alt="<?= ($article['descriptif_image'])?>">
                <div class="info_article">
                    <p>Publié le <?= ($article['date']) ?></p>
                    <h2><?= ($article['titre']) ?></h2>
                </div>
            </article>
        
        <?php } ?>
    </section>

</body>
<?php $content = ob_get_clean(); ?>
<?php $title = "A propos" ?>
<?php require 'templates/template.php' ?>