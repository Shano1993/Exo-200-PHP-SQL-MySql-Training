<?php

require __DIR__ . '/utils.php';

if (issetPostParams('name', 'difficulty', 'distance', 'duration', 'height_difference')) {
    try {
        $server = 'localhost';
        $db = 'training';
        $user = 'root';
        $password = '';

        $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        $stmt = $pdo->prepare("
            INSERT INTO hiking (name, difficulty, distance, duration, height_difference)
            VALUES (:name, :difficulty, :distance, :duration, :height_difference)
        ");

        $stmt->execute([
            ':name' => $_POST['name'],
            ':difficulty' => $_POST['difficulty'],
            ':distance' => $_POST['distance'],
            ':duration' => $_POST['duration'],
            ':height_difference' => $_POST['height_difference'],
        ]);
    }

    catch (Exception $exception) {
        echo $exception->getMessage();
    }
}