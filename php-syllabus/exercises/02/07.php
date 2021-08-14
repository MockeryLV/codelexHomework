<?php


$number = 33;

switch (true){
    case $number < 50:
        echo 'low' . PHP_EOL;
        break;
    case $number>100:
        echo 'high'. PHP_EOL;
        break;
    case $number >= 50 && $number<=100:
        echo 'medium'. PHP_EOL;
        break;
    default:
        echo 'Undefined value'. PHP_EOL;
        break;
}