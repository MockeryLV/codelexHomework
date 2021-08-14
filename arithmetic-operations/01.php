<?php



system('clear');

function isFifteenEtc(int $n1,  int $n2): int {

    switch(true){
        case $n1 + $n2 === 15 || $n1 - $n2 === 15 || $n2 - $n1 === 15:
            return true;
            break;
        case $n1 === 15 || $n2 === 15:
            return true;
            break;
        default:
            return false;
    }

}

$n1  = (int )readline('Enter an integer: ');

$n2  = (int )readline('Enter a second integer: ');




echo isFifteenEtc($n1, $n2);