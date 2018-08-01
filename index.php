<?php

require_once("player.php");
require_once("game.php");

$players = new Player();

$players2 = ["Kuba", "Maciek","Tomek", "Michal"];

$players->addPlayers($players2);

$game = new Game();

$game->shufflePlayers($players->players);

print_r($game->combination);

$game->shufflePairs($game->combination);













