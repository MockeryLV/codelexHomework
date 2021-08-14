<?php


$min = 1;
$number = 10;

function factorial($number, $min){
    if($number ===  $min ){
        return $min;
    }
    return $number * factorial($number -1, $min);
}

echo factorial($number, $min) . PHP_EOL;