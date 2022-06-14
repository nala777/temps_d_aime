<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                            <a href="indexAdmin.php?action=dashboard"><li>Home</li></a>
                            <li>Modification Page
                                    <a href="indexAdmin.php?action=a_propos_admin"><li>A Propos</li></a>
                                    <a href="indexAdmin.php?action=portfolio_admin"><li>Portfolio</li></a>
                                    <a href="indexAdmin.php?action=blog_admin"><li>Blog</li></a>

                            </li>
                            <a href="index.php"><li>Retour sur le site</li></a>
                            <a href="indexAdmin.php?action=deconnexion"><li>Deconnexion</li></a>
                        </ul>
                        
                    </div>
                    <ul id="menu_desktop">
                        <a href="indexAdmin.php?action=dashboard"><li>Home</li></a>
                        <a href="indexAdmin.php?action=a_propos_admin"><li>A Propos</li></a>
                        <a href="indexAdmin.php?action=portfolio_admin"><li>Portfolio</li></a>
                        <a href="indexAdmin.php?action=blog_admin"><li>Blog</li></a>
                        <a href="indexAdmin.php?action=compte_admin"><li>Mon Compte</li></a>
                        <a href="index.php"><li>Retour sur le site</li></a>
                        <a href="indexAdmin.php?action=deconnexion"><li>Deconnexion</li></a>
                    </ul>
                </nav>
                
                
                
                <h2>Administration</h2>
            </div>
        </header>
        <?= $content ?>
    </body>
</html>