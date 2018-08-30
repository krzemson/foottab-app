<?php


require_once("src/player.php");
require_once("src/config.php");
require_once("src/database.php");

use TableFootball\Player;

class PlayerTest extends PHPUnit_Framework_TestCase
{
    public function testCheckSeason()
    {
        $checkTest = new Player();

        $this->assertEquals(12, $checkTest->checkSeason());
    }

    public function testNumberValue()
    {
        $checkTest = new Player();

        $this->assertEquals(1, $checkTest->number);
    }
}