<?php

// Identifiants pour la BDD, insérez les votres !
$userDb = "root";
$passwordDb ="";

//Initialisation de la connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=blog', $userDb, $passwordDb, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;

try{
    $query = $pdo->query('SELECT * FROM article');
    $articles = $query -> fetchAll();
} catch (PDOException $e) {
    $error = $e -> getMessage();
}
?>

<!doctype html>
<html lang="fr-FR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--Bootstrap CDN-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <title>Blog</title>
    </head>
    <body>


    <?php if($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php else: ?>
        <div class="container">
            <h1 class="text-center">Mon blog</h1>

            <div class="card mb-3 p-2">
                <h2 class="card-header">Liste des articles :</h2>
                <ul class="list-group list-group-flush">
                    <?php foreach ($articles as $article): ?>
                        <li class="list-group-item"><a href="/blog/article.php?id=<?= $article->id ?>"><?= htmlentities($article->nom) ?></a></li>
                    <?php endforeach ?>
                </ul>
                <a href="/blog/createArticle.php" class="card-link">Créer un article</a>
            </div>


        </div>
    <?php endif ?>
    </body>
</html>