<?php


$min = (int) readline('Min?');
$max = (int) readline('Max?');

for($i = $min; $i <= $max; $i++){

    for($k = $i; $k <= $max + $i - 1; $k++){

        if($k <= $max){
            echo $k;
        }else{
            echo $k - $max ;
        }


    }
    echo PHP_EOL;
}