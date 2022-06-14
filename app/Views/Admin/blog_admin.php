<?php ob_start(); ?>
<main class="container">

<h2>Ajout d'un nouvel article</h2>
<a title="ajout nouvelle article"  class="button" id="blog_button" href ="indexAdmin.php?action=ajout_blog">Ajouter</a>


<section id="blog">
        <?php foreach($articles as $article){?>
            <article class="article">
                <img src="<?= ($article['image']) ?>" alt="<?= ($article['descriptif_image'])?>">
                <div class="info_article article_blog">
                    <h2><?= ($article['titre']) ?></h2>
                    <p>Publié le <?= ($article['date']) ?></p>
                    <p>Catégorie : <?= ($article['categorie']) ?></p>  
                </div>
                <div class="action_bouton">
                    <a title="modifier l'article"  href="indexAdmin.php?action=modif_article&id=<?=($article['id'])?>">Modifier</a>
                    <a title="supprimer l'article"  href="indexAdmin.php?action=suppr_article&id=<?=($article['id'])?>">Supprimer</a>
                </div>
            </article>
        
        <?php } ?>
    </section>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Blog" ?>
<?php require 'templates/template.php' ?>