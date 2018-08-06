<?php

require_once("player.php");
require_once("game.php");

$player = new Player();

$players = ["Kuba", "Maciek","Tomek", "Michal","Janusz", "Krzysztof", "Andrzej", "Kamil"];

$player->addPlayers($players);

$game = new Game();

$game->shufflePairs($game->shufflePlayers($player->players), $players);

$game->showMatches($game->pairs);














