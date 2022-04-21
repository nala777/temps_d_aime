<?php ob_start(); ?>
<main>
    <form action="indexAdmin.php?action=updateArticle" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" value="<?= $modif['image'] ?>" required>
        <input placeholder="Descriptif" value ="<?=$modif['descriptif_image']?>" name="descriptif" type="text" required autofocus>
        <input placeholder="Titre Article" value ="<?=$modif['titre']?>" name="titre" type="text" required autofocus>
        <textarea placeholder="Texte Article" name="texte" type="text" required><?=$modif['texte']?></textarea>
        <select name="categories" id="categories" required>
            <?php foreach($categories as $categorie) {?>
                <option value="<?= $categorie['id']?>"><?= $categorie['categorie'] ?></option>
            <?php }?>
                <option value="<?= $modif['id']?>" selected hidden ><?= $modif['categorie'] ?></option>
        </select>
        <button type="submit">Ajouter article</button>
    </form>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Article" ?>
<?php require 'templates/template.php' ?>