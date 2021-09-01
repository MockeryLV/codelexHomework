<?php


$read = file('text.txt');

$saves = explode('*',$read[0]);

foreach ($saves as $save) {
    echo $save . PHP_EOL;
}

$shit = [
    'balance is 10*',
    'name is alexe*',
    'age is 12*'
    ];
//file_put_contents('text.txt', $shit);

