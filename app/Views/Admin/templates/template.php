<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <form action="indexAdmin.php" method="POST" enctype="multipart/form-data">
        <label for="file">Fichier</label>
        <input type="file" name="file">
        <label for="description">Descriptif Image</label>
        <input type="text" name="description">
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>