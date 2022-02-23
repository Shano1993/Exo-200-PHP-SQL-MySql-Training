<?php

function issetPostParams(string ...$params): bool {
    foreach ($params as $param) {
        if (!isset($_POST[$param])) {
            return false;
        }
    }
    return true;
}

function readTraining($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM hiking");
    if ($stmt->execute()) {
        foreach ($stmt->fetchall() as $hinkin) { ?>
            <table>
                <tr>
                    <th>Nom de la randonnée</th>
                    <th>Difficulté</th>
                    <th>Distance</th>
                    <th>Durée</th>
                    <th>Dénivelé</th>
                </tr>
                <tr>
                    <td><a href="/update.php"><?= $hinkin['name'] ?></a></td>
                    <td><?= $hinkin['difficulty'] ?></td>
                    <td><?= $hinkin['distance'] . "km" ?></td>
                    <td><?= $hinkin['duration'] ?></td>
                    <td><?= $hinkin['height_difference'] . "m" ?></td>
                    <td><a href="">Supprimer</a></td>
                </tr>
            </table> <?php
        }
    }
}
