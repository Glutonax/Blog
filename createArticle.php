<?php

// Identifiants pour la BDD, insérer les votres !
$userDb = "root";
$passwordDb ="";

//Initialisation de la connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=blog', $userDb, $passwordDb, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);

$error = null;
$sucess= null;

try{
    if (isset($_POST['nom'],$_POST['contenu'])){

        //Protection contre les injections SQL, on prépare la requête puis on insére les données récupérées
        $query = $pdo->prepare('INSERT INTO article (nom, contenu, createDate) values (:nom, :contenu, CURRENT_TIMESTAMP)');
        $query->execute([
            'nom' => $_POST['nom'],
            'contenu' => $_POST['contenu']
        ]);
        $sucess ='l\'article a bien été cré';
    }
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
        <div class="container">
            <?php if($sucess): ?>
                <div class="alert alert-success mt-2"><?= $sucess ?></div>
                <?php
                    sleep(2);
                    header('Location: /blog/index.php');
                ?>
            <?php endif ?>
            <?php if($error): ?>
                <div class="alert alert-danger mt-2"><?= $error ?></div>
            <?php else: ?>

            <h1>Créer un article</h1>
            <form action="" method="post">
                <div class="form-group">
                    <label for="nom" class="mt-3">Titre de l'article :</label>
                    <input type="text" class="form-control mb-3" name="nom" value="Votre titre ici">
                </div>
                <label for="contenu" class="mt-3">Contenu de l'article :</label>
                <div class="form-group">
                    <textarea class="form-control mb-3" name="contenu" cols="30" rows="10">Votre contenu ici...</textarea>
                </div>
                <button class="btn btn-primary">Valider l'article</button>
                <a href="/blog/index.php" class="card-link">Retour à la page d'accueil</a>
            </form>
        </div>

    <?php endif ?>
    </body>
</html>