<?php


$number = 99;

if($number >= 1 && $number <=100){
    echo 'The number ' . $number . ' is in the range of 1 and 100!' . PHP_EOL;
}else{
    echo 'Woops... The number ' . $number . ' is beyond the range of 1 and 100!' . PHP_EOL;
}