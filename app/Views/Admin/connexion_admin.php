<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="app/public/Administration/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <link href="app/public/Administration/css/style.css" rel="stylesheet" type="text/css">
        <title>Connexion</title>
    </head>

    <body>
        <main class="container">
            <section id="connexion_admin">
                <h1>Connexion Administrateur</h1>
                <?php if (isset($erreur)):
                    if($erreur): 
                        foreach($erreur as $e):?>
                            <p class="msg-error"><?= $e ?></p>
                        <?php endforeach;
                    endif;
                endif;?>
                <!-- form connexion admin -->
                <form action="indexAdmin.php?action=connexionAdmin" method="post">
                    <div>
                        <label for="email"> Email:</label>
                        <input aria-label="email" type="email" name="mail" id="email" placeholder="Votre email" required>
                    </div>

                    <div>
                        <label for="password"> Mot de Passe:</label>
                        <input aria-label="mot_de_passe" type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                    </div>
                    <button id="connexion-submit" type="submit">Connexion</button>
                </form>
            

        <!-- <form id="contact" action="indexAdmin.php?action=createAdmin" method="post">
            <input aria-label="" placeholder="Votre Prenom" name="firstname" type="text" required autofocus>
            <input aria-label="" placeholder="Votre nom" name="lastname" type="text" required>
            <input aria-label="" placeholder="Votre Email" name="mail" type="mail" required>
            <input aria-label="" placeholder="Votre Mdp" name="password" type="password" required>
            <button name="submit" type="submit" id="create-admin">Envoyer</button>
        </form> -->
            </section>
        </main>
    </body>
</html>
