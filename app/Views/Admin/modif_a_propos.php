<?php ob_start(); ?>
<main>
    <form action="indexAdmin.php?action=updatePropos&id=<?= $modifP['id'] ;?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" value="<?=$modifP['image']?>">
        <input placeholder="Descriptif" value ="<?=$modifP['descriptif_image']?>" name="descriptif" type="text" required autofocus>
        <input placeholder="Titre Article" value ="<?=$modifP['titre']?>" name="titre" type="text" required autofocus>
        <textarea placeholder="Texte Article" name="texte" type="text" required><?=$modifP['texte']?></textarea>
        <button type="submit">Modifier</button>
    </form>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Page A Propos" ?>
<?php require 'templates/template.php' ?>