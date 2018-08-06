<?php 



class Player {
    
    public $players_count;
    
    public $players = [];
    
    
    public function addPlayers($playersNames){
        
            $this->players = $playersNames;
        
        return $this->players;
    }
    
    public function getPLayersCount($count){
        
        return $this->$players_count;
    }
    
    public function setPLayersCount($count){
        $this->players_count = $count;
        
        return $this->players_count;
    }
    

}