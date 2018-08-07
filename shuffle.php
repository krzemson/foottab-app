<?php
session_start();


require_once("player.php");
require_once("game.php");


if(isset($_POST['nick1'])){
    
    $player->setPLayersCount($_SESSION['number']);
    
    $pairs = $player->addPlayers("nick");

    $game = new Game();
    
    $shuffle = $game->shufflePlayers($player->players);

    $game->shufflePairs($shuffle, $pairs);

    $game->showMatches($game->pairs);
}else {
    header("Location: index.php");
}
















