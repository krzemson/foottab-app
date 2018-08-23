<?php

namespace TableFootball;

class Player
{
    
    public $players_count;
    
    public $players = [];

    public $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    /**
     * @param $playersNames
     * @return array
     */
    public function addPlayers($playersNames)
    {
        
        for ($i = 1; $i <=$this->players_count; $i++) {
                $this->players[] = $_POST["$playersNames$i"];
        }

        $this->save($this->players);

        return $this->players;
    }

    /**
     * @param $count
     */
    public function setPLayersCount($count)
    {
        $this->players_count = $count;
        
        unset($count);
    }

    /**
     * @param $players
     * @return boolean
     */
    private function save($players)
    {
        foreach ($players as $player) {
            $sql = "INSERT INTO players (name, points) VALUES ('$player',0)";

            $this->database->query($sql);
        }

        return true;
    }
}
