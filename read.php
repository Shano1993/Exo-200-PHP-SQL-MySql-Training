<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/basics.css">
    <title>Randonnées, read</title>
</head>
<body>
    <h1>Liste des randonnées</h1>
    <a href="/create.php" class="create">Retourner à la création</a>
</body>
</html>

<?php
require __DIR__ . '/utils.php';
try {
    $server = 'localhost';
    $db = 'training';
    $user = 'root';
    $password = '';

    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    readTraining($pdo);
}

catch (Exception $exception) {
    echo $exception->getMessage();
}







