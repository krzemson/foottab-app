<?php
$teams = [1,2,3,5,6];


$pair[] = array_shift($teams);
$pair[] = array_shift($teams);
$pair[] = array_shift($teams);
$pair[] = array_shift($teams);



print_r($pair);

print_r($teams);



echo "<br>";
echo sizeof($pair);

for($i=0; $i < sizeof($pair); $i++){
$teams[] = array_shift($pair);

}


print_r($pair);

echo "<br>";
print_r($teams);


