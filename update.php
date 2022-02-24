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

    if (isset($_POST['maj'])) {
        updateTraining($_GET['update'], $_POST['name'], $_POST['difficulty'], $_POST['distance'], $_POST['duration'], $_POST['height_difference'], $pdo); ?>
        <div class="message">Modification réussie !</div> <?php
    }
}

catch (Exception $exception) {
    echo $exception->getMessage();
} ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/basics.css">
    <title>Randonnées, update</title>
</head>
<body>
    <h1>Mettre à jour une randonnée</h1>
    <div>
        <a href="/read.php" class="create">Voir les randonnées</a>
    </div>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Nom de la randonnée">
        <select name="difficulty" id="difficulty">
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance" placeholder="Distance">
        <input type="text" name="duration" placeholder="Durée de la randonnée">
        <input type="number" name="height_difference" placeholder="Dénivelé">
        <input type="submit" name="maj" value="Mettre à jour">
    </form>
</body>
</html>






