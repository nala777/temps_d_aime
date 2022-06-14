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
                            <a title="dashboard" href="indexAdmin.php?action=dashboard"><li>Home</li></a>
                            <a title="a propos admin"  href="indexAdmin.php?action=a_propos_admin"><li>A Propos</a></li>
                            <a title="portfolio admin" href="indexAdmin.php?action=portfolio_admin"><li>Portfolio</li></a>
                            <a title="blog admin" href="indexAdmin.php?action=blog_admin"><li>Blog</li></a>
                            <a title="Retourner sur le site" href="index.php"><li>Retour sur le site</li></a>
                            <a title="deconnexion" href="indexAdmin.php?action=deconnexion"><li>Deconnexion</li></a>
                        </ul>
                        
                    </div>
                    <ul id="menu_desktop">
                        <a title="dashboard" href="indexAdmin.php?action=dashboard"><li>Home</li></a>
                        <a title="a propos admin" href="indexAdmin.php?action=a_propos_admin"><li>A Propos</li></a>
                        <a title="portfolio admin" href="indexAdmin.php?action=portfolio_admin"><li>Portfolio</li></a>
                        <a title="blog admin" href="indexAdmin.php?action=blog_admin"><li>Blog</li></a>
                        <a title="" href="index.php"><li>Retour sur le site</li></a>
                        <a title="" href="indexAdmin.php?action=deconnexion"><li>Deconnexion</li></a>
                    </ul>
                </nav>
                
                
                
                <h2>Administration</h2>
            </div>
        </header>
        <?= $content ?>
    </body>
</html>