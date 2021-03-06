<?php ob_start(); ?>
<main class="container">

    <h1>Mails reçu</h1>
    <table id="carnet">
        <thead>
            <tr>
                <th class="mobile_mail">Nom du contact</th>
                <th>Email</th>
                <th>Sujet</th>
                <th class="mobile_mail">Contenu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- boucle affichage mails-->
            <?php foreach($mails as $mail){ ?>
                <tr>
                    <td class="mobile_mail"><?= $mail['nom'] ?></td>
                    <td><?= $mail['mail'] ?></td>
                    <td><?= $mail['sujet'] ?></td>                
                    <td class="mobile_mail"><?= substr($mail['texte'],0 ,20). ' ...' ?></td>
                    <td class="icones">
                        <a title="voir le mail"  href="indexAdmin.php?action=voirMail&id=<?= $mail['id']?>"><i class="fa-regular fa-eye"></i></a>
                        <a title="supprimer le mail"  href="indexAdmin.php?action=deleteMail&id=<?= $mail['id']?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>                
                </tr>
            <?php }?>
        </tbody>
    </table>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Mails Admin" ?>
<?php require 'templates/template.php' ?>