<?php

$number  = 110;

for($i = 1; $i<=$number; $i++){
    switch(true){
        case $i % 3 === 0 && $i % 5 !== 0 && $i % 7 !== 0:
            echo 'Coza ';
            break;
        case $i % 5 === 0 && $i % 3 !== 0 && $i % 7 !== 0:
            echo 'Loza ';
            break;
        case $i % 7 === 0 && $i % 3 !== 0 && $i % 5 !== 0:
            echo 'Woza ';
            break;
        case $i % 3 === 0 && $i % 5 === 0 && $i % 7 !== 0:
            echo 'CozaLoza ';
            break;
        case $i % 3 === 0 && $i % 7 === 0 && $i % 5 !== 0:
            echo 'CozaWoza ';
            break;
        case $i % 3 === 0 && $i % 7 === 0 && $i % 5 === 0:
            echo 'CozaLozaWoza ';
            break;
        case $i % 5 === 0 && $i % 7 === 0 && $i % 3 !== 0:
            echo 'LozaWoza ';
            break;
        default:
            echo $i . " ";
            break;
    }
    if($i % 11 === 0){
        echo PHP_EOL;
    }
}