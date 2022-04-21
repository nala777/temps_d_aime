<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="app\public\Administration\css\style.css" rel="stylesheet" type="text/css">
        <title><?=$title?></title>
    </head>

    <body>
        <header>
            <div id="entete_admin" class="container">
                <nav role="navigation">
                    <div id="menuToggle">
                        <input type="checkbox" />
                        <span></span>
                        <span></span>
                        <span></span>
                        <ul id="menu">
                            <a href="/"><li>DashBoard</li></a>
                            <li>Contenu Page
                                <ul>
                                    <a href="indexAdmin.php?action=aPropos_admin"><li>A Propos</li></a>
                                    <a href="indexAdmin.php?action=services_admin"><li>Services</li></a>
                                    <a href="indexAdmin.php?action=portfolio_admin"><li>Portfolio</li></a>
                                    <a href="indexAdmin.php?action=blog_admin"><li>Blog</li></a>
                                </ul>
                            </li>
                            <a href="indexAdmin.php?action=compte_admin"><li>Mon Compte</li></a>
                            <a href="indexAdmin.php?action=deconnexion"><li>Deconnexion</li></a>
                        </ul>
                    </div>
                </nav>
                <h2>Administration</h2>
            </div>
        </header>
        <?= $content ?>
    </body>
</html>