<?php ob_start(); ?>
<main class="container">

    <h1>Carnet d'adresse</h1>
    <table id="carnet">
        <thead>
            <tr>
                <th>Nom du contact</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contacts as $contact){ ?>
                <tr>
                    <td><?= $contact['nom'] ?></td>
                    <td><?= $contact['contact'] ?></td>                
                </tr>
            <?php }?>
        </tbody>
    </table>
</main>
<?php $content = ob_get_clean(); ?>
<?php $title = "Contact Admin" ?>
<?php require 'templates/template.php' ?>