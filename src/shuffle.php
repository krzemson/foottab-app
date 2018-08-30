<?php

use TableFootball\Game;
use TableFootball\Player;

session_start();

require_once("config.php");
require_once("database.php");
require_once("player.php");
require_once("game.php");


for ($i = 1; $i <= $_SESSION['number']; $i++) {
    if (empty($_POST["nick$i"])) {
        header("Location: index.php");
        exit();
    }
}

if (isset($_POST['nick1'])) {
    $player = new Player();
    $player->setPlayersCount($_SESSION['number']);

    $pairs = $player->addPlayers("nick");

    $game = new Game();

    $shuffle = $game->shufflePlayers($player->players);

    $game->shufflePairs($shuffle, $pairs);

    $_SESSION['score'] = $game->pairs2;
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
   
   <form method="post" action="score.php">
    <?php

    $count = 0;

    foreach ($game->pairs2 as $pair2) {
        echo "<p>
               <b>($pair2[0], $pair2[1])</b>
                zagrają z 
                <b>($pair2[2], $pair2[3])</b>
                <input type=\"number\" name='score$count' min='1' max='2'>
                </p>";
        $count++;
    }
    ?>
       <input type="submit" name="submit1">
   </form>
    
</body>
</html>
















