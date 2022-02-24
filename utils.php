<?php

// Vérification sur les inputs sont présent
function issetPostParams(string ...$params): bool {
    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
            return false;
        }
    }
    return true;
}

// Fonction pour ajouter les données dans un tableau
function readTraining($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM hiking");
    if ($stmt->execute()) {
        foreach ($stmt->fetchall() as $hinkin) { ?>
            <table>
                <tr>
                    <th id="number">Numéro</th>
                    <th>Nom de la randonnée</th>
                    <th>Difficulté</th>
                    <th>Distance</th>
                    <th>Durée</th>
                    <th>Dénivelé</th>
                </tr>
                <tr>
                    <td id="id"><?= $hinkin['id'] ?></td>
                    <td><a href="/update.php?update=<?= $hinkin['id'] ?>"><?= $hinkin['name'] ?></a></td>
                    <td><?= $hinkin['difficulty'] ?></td>
                    <td><?= $hinkin['distance'] . "km" ?></td>
                    <td><?= $hinkin['duration'] ?></td>
                    <td><?= $hinkin['height_difference'] . "m" ?></td>
                    <td><a href="/delete.php?delete=<?= $hinkin['id']?>">Supprimer</a></td>
                </tr>
            </table> <?php
        }
    }
}

// Fonction pour modifier les données d'une randonnée
function updateTraining($id, $name, $difficulty, $distance, $duration, $height_difference, $pdo) {
    $stmt = $pdo->prepare("
        UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference WHERE id = $id
    ");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':difficulty', $difficulty);
    $stmt->bindParam(':distance', $distance);
    $stmt->bindParam(':duration', $duration);
    $stmt->bindParam(':height_difference', $height_difference);

    $stmt->execute();
}

// Fonction pour supprimer une randonnée
function deleteTraining($id, $pdo) {
    $sql = "DELETE FROM hiking WHERE id = $id";
    if ($pdo->exec($sql) !== false) {
        header('Location: /read.php');
    }
}




