<?php


$first = (string) readline('Enter first word: ');

$second = (string) readline('Enter first word: ');


$sumOfWords = $first . $second;

echo $first . str_repeat('.', 30 - strlen($sumOfWords) ) . $second .PHP_EOL;
