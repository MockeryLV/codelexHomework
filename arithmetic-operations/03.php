<?php


$min  = 1;
$max = 100;

function sumOfRange($min, $max){
    if($max === 0 && $min === 0){
        return 0;
    }
    if($max - $min < 1 ){
        return 1;
    }else if ($max - $min === 0){
        return 0;
    }
    return $max + sumOfRange($min, $max -1);
}

function averageOf($min, $max){
    return ($min + $max) / 2;
}


echo sumOfRange($min, $max) . PHP_EOL;
echo averageOf($min, $max) . PHP_EOL;