<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="app\public\Front\css\sytle.css" rel="stylesheet" type="text/css">
    <title><?=$title?></title>
</head>
<body class="container">
    <header>
        <div id="entete">
            
            <nav role="navigation">
                <div id="menuToggle">
                    <input type="checkbox" />
                    <span></span>
                    <span></span>
                    <span></span>
                    <ul id="menu">
                        <a href="/"><li>Home</li></a>
                        <a href="index.php?action=aPropos"><li>A Propos</li></a>
                        <a href="index.php?action=services"><li>Services</li></a>
                        <a href="index.php?action=portfolio"><li>Portfolio</li></a>
                        <a href="index.php?action=blog"><li>Blog</li></a>
                        <a href="index.php?action=contact"><li>Contact</li></a>
                        <li>Connexion</li>
                    </ul>
                </div>
            </nav>
            <div class="tempsDaime">
                <h2>Temps D'aime</h2>
                <img src="app\public\Front\img\logo-min.png" alt="logo temps d'aime">
            </div>
        </div>
    </header>

    <?= $content ?>

    <footer class="container">
        <div class="tempsDaime">
            <img src="app\public\Front\img\logo-min.png" alt="logo temps d'aime">
            <h2>Temps D'aime</h2>
        </div>
        <address>
            <p>54 rue de poupi<br>29540 Spézet, France</p>
        </address>
        <div id="reseaux">
            <p>Vous pouvez me retrouver <br> sur les réseaux sociaux</p>
            
        </div>

    </footer>
</body>
</html>