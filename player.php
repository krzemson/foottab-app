<?php

namespace TableFootball;

class Player
{
    
    public $players_count;
    
    public $players = [];

    /**
     * @param $playersNames
     * @return array
     */
    public function addPlayers($playersNames)
    {
        
        for ($i = 1; $i <=$this->players_count; $i++) {
                $this->players[] = $_POST["$playersNames$i"];
        }
            
        
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
}



