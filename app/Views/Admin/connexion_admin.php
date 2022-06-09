<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="app\public\Administration\css\style.css" rel="stylesheet" type="text/css">
        <title>Connexion</title>
    </head>

    <body>
        <main class="container">
            <section id="connexion_admin">
                <h1>Connexion Administrateur</h1>
                <form action="indexAdmin.php?action=connexionAdmin" method="post">
                    <div>
                        <label for="email"> Email:</label>
                        <input type="email" name="mail" id="email" placeholder="Votre email" required>
                    </div>

                    <div>
                        <label for="password"> Mot de Passe:</label>
                        <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
                    </div>
                    <button id="connexion-submit" type="submit">Connexion</button>
                </form>
            

        <!-- <form id="contact" action="indexAdmin.php?action=createAdmin" method="post">
            <input placeholder="Votre Prenom" name="firstname" type="text" required autofocus>
            <input placeholder="Votre nom" name="lastname" type="text" required>
            <input placeholder="Votre Email" name="mail" type="mail" required>
            <input placeholder="Votre Mdp" name="password" type="password" required>
            <button name="submit" type="submit" id="create-admin">Envoyer</button>
        </form> -->
            </section>
        </main>
    </body>
</html>
