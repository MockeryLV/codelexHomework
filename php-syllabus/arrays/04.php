<?php




$firstArray = [];

for($i = 0; $i<10; $i++){
    $firstArray[$i] = rand(1, 100);
}

$secondArray = $firstArray;

$firstArray[array_key_last($firstArray)] = -7;


echo 'Array 1: ';
foreach($firstArray as $item){
    echo $item . ' ';
}

echo PHP_EOL . 'Array 2: ';
foreach($secondArray as $item){
    echo $item . ' ';
}

echo PHP_EOL;
