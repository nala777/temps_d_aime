<?php ob_start(); ?>
<main class="container">
    <h1>Modification partie à propos</h1>
    <form class="formulaire" action="indexAdmin.php?action=updatePropos&id=<?= $modifP['id'] ;?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input placeholder="Descriptif image" value ="<?=$modifP['descriptif_image']?>" name="descriptif" type="text" required >
        <input placeholder="Titre Article" value ="<?=$modifP['titre']?>" name="titre" type="text" required >
        <textarea placeholder="Texte Article" name="texte" required><?=$modifP['texte']?></textarea>
        <button type="submit">Modifier</button>
    </form>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Modification Page A Propos" ?>
<?php require 'templates/template.php' ?>