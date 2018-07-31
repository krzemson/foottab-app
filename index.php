<?php

$tablica = ['A','B','C','D','E','F','G','H'];

for($i = 0; $i< sizeof($tablica); $i++) {
   for ($n = $i; $n<sizeof($tablica); $n++) {
       if ($tablica[$i] != $tablica[$n] ) {
          $kombinacja[] = "($tablica[$i],$tablica[$n])"; 
       }
   }
}



 
$pairs = []; // tablica z parami meczowymi

while(sizeof($pairs) < 28)
{
 
   shuffle($kombinacja); //mieszam tablicę

   if(substr($kombinacja[0], 1,1) != substr($kombinacja[1], 1,1) & substr($kombinacja[0], 1,1) != substr($kombinacja[1], 3,1) & substr($kombinacja[0], 3,1) != substr($kombinacja[1], 1,1) & substr($kombinacja[0], 3,1) != substr($kombinacja[1], 3,1)){ //sprawdzenie czy cztery litery nie sa obok siebie
 		
    $pairs[] = array_shift($kombinacja); //dodajemy nową parę do reszty par
    $pairs[] = array_shift($kombinacja); //dodajemy nową parę do reszty par
    }else {
       
    	shuffle($kombinacja);
 
    }
    
    
    if(sizeof($kombinacja) == 2) {
        
        if(!(substr($kombinacja[0], 1,1) != substr($kombinacja[1], 1,1) & substr($kombinacja[0], 1,1) != substr($kombinacja[1], 3,1) & substr($kombinacja[0], 3,1) != substr($kombinacja[1], 1,1) & substr($kombinacja[0], 3,1) != substr($kombinacja[1], 3,1))){
            for($i= 0; $i < 26; $i++){
                $kombinacja[] = array_shift($pairs);
            }
            
        }
    }
    
}

$pairs2 = [];

for($i=0; $i<14; $i++){
    $pair2 = [];
    
    $pair2 = [array_shift($pairs),array_shift($pairs)];
    
    $pairs2[] = $pair2;
}



 foreach($pairs2 as $pair2)
    echo '<p><b>' . $pair2[0] . '</b> zagra przeciwko <b>' . $pair2[1] .'</b></p>';













