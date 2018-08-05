<?php

function checkifthesame($table) {
    if($table[0][0] != $table[1][0] & $table[0][0] != $table[1][1] & $table[0][1]  != $table[1][0] & $table[0][1]  != $table[1][1])
        return true;
}

function checkifthesame4($table) {
    if($table[0][0] != $table[1][0] & $table[0][0] != $table[1][1] & $table[0][1]  != $table[1][0] & $table[0][1]  != $table[1][1] & $table[0][0] != $table[2][0] & $table[0][0] != $table[2][1] & $table[0][1]  != $table[2][0] & $table[0][1]  != $table[2][1] & $table[0][0] != $table[3][0] & $table[0][0] != $table[3][1] & $table[0][1]  != $table[3][0] & $table[0][1]  != $table[3][1])
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


while(sizeof($pairs) < 28){


      shuffle($combination);

      
      

      if(checkifthesame($combination)){

        $pairs[] = array_shift($combination);
        $pairs[] = array_shift($combination);

      }

      if(empty($combination))
        break;

      if(sizeof($combination) == 2 & !checkifthesame($combination)){
        
        $combination[] = array_shift($pairs);
        $combination[] = array_shift($pairs);
      }elseif(sizeof($combination) == 4){
        if(!checkifthesame4($combination)){
          $combination[] = array_shift($pairs);
          $combination[] = array_shift($pairs);
        }
      }

}

 while(!empty($pairs)) {

    $pairs2[] = array_merge(array_shift($pairs),array_shift($pairs));

 }


   





foreach ($pairs2 as $pair2) {
  echo "<b>($pair2[0], $pair2[1])</b> zagrają z <b>($pair2[2], $pair2[3])</b><br>";
}


 















