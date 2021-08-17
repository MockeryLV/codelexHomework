<?php


$number  = (int) readline ("Enter the number: ");

if($number < 0){
    echo $number . ' is negative' . PHP_EOL;
}elseif ($number === 0){
    echo $number . ' is nor positive nor negative'. PHP_EOL;
}
else{
    echo $number . ' is positive'. PHP_EOL;
}