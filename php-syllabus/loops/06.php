<?php

$number = (int) readline('Enter the number of rows: ');
$lenght  = 0;


for($i = 1; $i<$number; $i++){
    $lenght = $lenght + 8;
}

for($i = 8; $i <= $lenght; $i = $i + 8){

    if($i === 8){
        echo str_repeat('/', $lenght/2);
        echo str_repeat('\\', $lenght/2);
        echo PHP_EOL;
    }
    echo str_repeat('/', ($lenght - $i) / 2);
    echo str_repeat('*', $i);
    echo str_repeat('\\', ($lenght - $i) / 2);
    echo PHP_EOL;

}



