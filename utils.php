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
                    <td><a href="/update.php"><?= $hinkin['name'] ?></a></td>
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

function deleteTraining($id, $pdo) {
    $sql = "DELETE FROM hiking WHERE id = $id";
    if ($pdo->exec($sql) !== false) {
        header('Location: /read.php');
    }
}




