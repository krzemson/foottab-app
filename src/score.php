<?php

use TableFootball\Player;

session_start();

require_once("config.php");
require_once("database.php");
require_once("player.php");

if (isset($_POST['submit1'])) {
    $player = new Player();

    $player->addScore(sizeof($_SESSION['score']), $_SESSION['score']);

    $scores = $player->showTable();
} else {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilkarzyki</title>
</head>

<body>

<table align="center">
    <thead>
        <tr>
            <th>Name</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
    <?php

    foreach ($scores as $score) {
        echo "<tr>";
        echo "<td>{$score['name']}</td>";
        echo "<td>{$score['points']}</td>";
        echo "</tr>";
    }

    ?>
    </tbody>
</table>



</body>
</html>