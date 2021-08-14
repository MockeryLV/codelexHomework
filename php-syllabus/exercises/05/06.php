<?php


$someArray = [1, 2, 3, 5.4, 'string'];

function DoubleEm(int $number): int{
    return $number * 2;
}


for($i = 0; $i < count($someArray); $i++){
    if(is_int($someArray[$i])){
        echo DoubleEm($someArray[$i]) . "\n";
    }
}



