<?php

while(true){

    system('clear');
    $sum = (int) readline("Desired sum: ");

    if($sum <= 12 && $sum >= 2){
        break;
    }
    readline('Wrong input, Try again!');
}

while(true){

    $n1 = (int) round(rand(1, 6), 0);
    $n2 = (int) round(rand(1, 6), 0);

    echo "$n1 and $n2 = " . ($n1 + $n2) . PHP_EOL;

    if($n1 + $n2 === $sum){
        exit;
    }

}