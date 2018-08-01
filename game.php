<?php

class Game {
    
    public $combination = [];
    public $pairs = [];
    public $pairs2 = [];
    public $tmppair = [];
    
    
    public function shufflePlayers($players){
        
        for($i = 0; $i< sizeof($players); $i++) {
           for ($n = $i; $n<sizeof($players); $n++) {
               if ($players[$i] != $players[$n] ) {
                  $this->combination[] = "($players[$i],$players[$n])"; 
               }
           }
        }
        
        return $this->combination;
    }
    
    public function shufflePairs($combination) {
        
        
        while(sizeof($this->pairs) < 28)
            {

               shuffle($this->combination); //mieszam tablicę

               if(substr($this->combination[0], 1,1) != substr($this->combination[1], 1,1) & substr($this->combination[0], 1,1) != substr($this->combination[1], 3,1) & substr($this->combination[0], 3,1) != substr($this->combination[1], 1,1) & substr($this->combination[0], 3,1) != substr($this->combination[1], 3,1)){ //sprawdzenie czy cztery litery nie sa obok siebie

                $this->pairs = array_shift($this->combination); //dodajemy nową parę do reszty par
                $this->pairs = array_shift($this->combination); //dodajemy nową parę do reszty par
                }else {

                    shuffle($this->combination);

                }


                if(sizeof($this->combination) == 2) {

                    if(!(substr($this->combination[0], 1,1) != substr($this->combination[1], 1,1) & substr($this->combination[0], 1,1) != substr($this->combination[1], 3,1) & substr($this->combination[0], 3,1) != substr($this->combination[1], 1,1) & substr($this->combination[0], 3,1) != substr($this->combination[1], 3,1))){
                        for($i= 0; $i < 26; $i++){
                            $this->combination[] = array_shift($this->pairs);
                        }

                    }
                }

            }
        
        
        return $this->pairs;
        
    }
    
    public function addPairs($pairs){
        for($i=0; $i<sizeof($pairs)/2; $i++){

                $this->$tmppair = [array_shift($pairs),array_shift($pairs)];

                $this->pairs2[] = $this->tmppair;
            }
    }
    
    public function showMatches($pairs2) {
        
        
        foreach($pairs2 as $pair2)
            echo '<p><b>' . $pair2[0] . '</b> zagra przeciwko <b>' . $pair2[1] .'</b></p>';
    }
    
    
    
    
}