<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="app/public/Front/css/style.css" rel="stylesheet" type="text/css">
    <title><?=$title?></title>
</head>
<body >
    <header class="container">
        <div id="entete">
            
            <nav role="navigation">
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <ul id="menu">
                        <a title="Page Home"  href="index.php"><li>Home</li></a>
                        <a title="Page A Propos"  href="index.php?action=aPropos"><li>A Propos</li></a>        
                        <a title="Page Portfolio"  href="index.php?action=portfolio"><li>Portfolio</li></a>
                        <a title="Page Blog"  href="index.php?action=blog"><li>Blog</li></a>
                        <a title="Page Connexion"  href="indexAdmin.php"><li>Connexion</li></a>
                    </ul>
                </div>
                <ul id="menu_desktop">
                        <a title="Page Home"  href="index.php"><li>Home</li></a>
                        <a title="Page A propos"  href="index.php?action=aPropos"><li>A Propos</li></a>
                        <a title="Page Portfolio"  href="index.php?action=portfolio"><li>Portfolio</li></a>
                        <a title="Page Blog"  href="index.php?action=blog"><li>Blog</li></a>
                        <a title="Page Connexion" href="indexAdmin.php"><li>Connexion</li></a>
                    </ul>
            </nav>
            <div class="tempsDaime">
                <h2>Temps D'aime</h2>
                <img src="app\public\Front\img\logo-min.png" alt="logo temps d'aime">
            </div>
        </div>
    </header>

    <?= $content ?>

    <footer class="container">
        <div id="logo_reseaux">
            <img src="app\public\Front\img\SVG\facebook.svg" class="reseaux">
            <img src="app\public\Front\img\SVG\instagram.svg" class="reseaux">
            <img src="app\public\Front\img\SVG\twitter.svg" class="reseaux">
        </div>
        <div class="tempsDaime">
            <img src="app\public\Front\img\logo-min.png" alt="logo temps d'aime">
            <h2>Temps D'aime</h2>
        </div>
    </footer>
</body>
</html>