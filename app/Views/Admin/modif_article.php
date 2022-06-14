<?php ob_start(); ?>
<main class="container">
    <h1>Modification de l'article</h1>
    <form class="formulaire" action="indexAdmin.php?action=updateArticle&id=<?= $modif['idArt'] ;?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input placeholder="Descriptif image" value ="<?=$modif['descriptif_image']?>" name="descriptif" type="text" required >
        <input placeholder="Titre Article" value ="<?=$modif['titre']?>" name="titre" type="text" required >
        <textarea placeholder="Texte Article" name="texte" required><?=$modif['texte']?></textarea>
        <select name="categories" id="categories">
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['categorie'] ?></option>
            <?php }?>
                <option value="<?= $modif['id']?>" selected ><?= $modif['categorie'] ?></option>
        </select>
        <button type="submit">Modifier article</button>
    </form>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Article" ?>
<?php require 'templates/template.php' ?>