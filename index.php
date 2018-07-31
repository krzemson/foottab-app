<?php

$tablica = ['A','B','C','D','E','F','G','H'];

for($i = 0; $i< sizeof($tablica); $i++) {
   for ($n = $i; $n<sizeof($tablica); $n++) {
       if ($tablica[$i] != $tablica[$n] ) {
          $kombinacja[] = "($tablica[$i],$tablica[$n])"; 
       }
   }
}



 
$pairs = []; //tu będziemy trzymać pary; para to tablica (dostaniemy tablicę tablic)
 
while(!empty($kombinacja))
{
    $pair = [];
 
 
    
   shuffle($kombinacja); //"mieszamy" tablicę

   if(substr($kombinacja[0], 1,1) != substr($kombinacja[1], 1,1) & substr($kombinacja[0], 1,1) != substr($kombinacja[1], 3,1) & substr($kombinacja[0], 3,1) != substr($kombinacja[1], 1,1) & substr($kombinacja[0], 3,1) != substr($kombinacja[1], 3,1)){
    $pair = [array_shift($kombinacja), array_shift($kombinacja)];
 		shuffle($kombinacja);
    $pairs[] = $pair; //dodajemy nową parę do reszty par
    }else {
    	$pairs2[] = array_shift($kombinacja);

    	$pairs2[] = array_shift($kombinacja);

    }
}

while(!empty($pairs2)){
	$pairs2[] = $pairs2[] = array_shift($pairs);
	$pairs2[] = $pairs2[] = array_shift($pairs);

	shuffle($pairs2);
	if(substr($pairs2[0], 1,1) != substr($pairs2[1], 1,1) & substr($pairs2[0], 1,1) != substr($pairs2[1], 3,1) & substr($pairs2[0], 3,1) != substr($pairs2[1], 1,1) & substr($pairs2[0], 3,1) != substr($pairs2[1], 3,1)){
    $pair = [array_shift($pairs2), array_shift($pairs2)];
 		shuffle($pairs2);
    $pairs[] = $pair; //dodajemy nową parę do reszty par
    }
}











foreach($pairs as $pair)
    echo '<p><b>' . $pair[0] . '</b> zagra przeciwko <b>' . $pair[1] .'</b></p>';

foreach ($kombinacja as $komb)
	echo $komb. "<br>";





