<?php


system('clear');

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];



$search = (int) readline("Enter the value to search for: ");


if(in_array($search, $numbers)){
    echo PHP_EOL . "The array has ($search) by the index [" . array_search($search, $numbers) . "]." . PHP_EOL;
}else{
    echo PHP_EOL. "The array has no {$search} in it." . PHP_EOL;
}