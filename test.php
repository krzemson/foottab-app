<?php

function checkifthesame($table) {
    if($table[0][0] != $table[1][0] & $table[0][0] != $table[1][1] & $table[0][1]  != $table[1][0] & $table[0][1]  != $table[1][1])
        return true;
}



$players = ["A", "B","C", "D","E","F","G","H"];

for($i = 0; $i< sizeof($players); $i++) {
           for ($n = $i; $n<sizeof($players); $n++) {
               if ($players[$i] != $players[$n] ) {
                  $combination[] = [$players[$i],$players[$n]]; 
               }
           }
        }
$pairs = [];

$pairs2 = [];


$i = 0;
    
while($i< 30){
    
    
    shuffle($combination);
    
    if(checkifthesame($combination)){
        $pairs[] = array_merge(array_shift($combination),array_shift($combination)); 
    }else {
        shuffle($combination);

    }
    
    if(empty($combination)){
        break;
    }
    
    if(sizeof($combination) <= 4 || sizeof($combination) >=2){
        if(checkifthesame($combination) == false) {
            
            echo "babyl";
        }
    }
    
    $i++;
    
}


foreach($pairs as $pair){
    echo "<b>($pair[0], $pair[1])</b> zagra przeciwko <b>($pair[2], $pair[3])</b><br>";
}

print_r($combination);












