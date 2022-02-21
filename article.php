<?php

// La page article.php nous permettra d'afficher l'article et de pouvoir accéder à la page form.php pour modifier ce dernier par le rédacteur.

// Identifiants pour la BDD, insérer les votres !
$userDb = "root";
$passwordDb ="";

//Initialisation de la connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=blog', $userDb, $passwordDb, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$error = null;

try{
    $query = $pdo->prepare('SELECT * FROM article WHERE id = :id');
    $query->execute([
        'id' => $_GET['id']
    ]);
    $article = $query -> fetch();
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
            <div class="card mb-3 mt-3">
                <h1 class="card-header"><?= htmlentities($article->nom)?></h1>
                <div class="card-body">
                    <p class="card-text"><?= htmlentities($article->contenu)?></p>
                    <a href="/blog/index.php" class="card-link">Retour à la liste des articles</a>
                </div>
                <div class="card-footer text-muted">
                    <?= "date et heure de publication : ".date($article->createDate) ?>
                </div>
            </div>
            <a href="/blog/form.php?id=<?= $article->id ?>"><button class="btn btn-outline-secondary">Modifier l'article</button></a>
        </div>

    <?php endif ?>
    </body>
</html>