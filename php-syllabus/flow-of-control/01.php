<?php



$amount  = (int) readline('Enter amount of numbers: ');

$numbers = [];


for($i = 0; $i<$amount; $i++){
    $number = (int) readline ('Enter the number:');
    $numbers[] = $number;
}


echo 'The largest number is ' . max($numbers) . PHP_EOL;

