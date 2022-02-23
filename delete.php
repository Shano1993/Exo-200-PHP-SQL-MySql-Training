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

}

catch (Exception $exception) {
    echo $exception->getMessage();
}


