<?php


function FizzBuzz(int $number){


    for($i = 1; $i <= $number; $i++){
        switch (true){
            case $i % 3 === 0 && $i % 5 !== 0:
                echo 'Fizz ';
                break;
            case $i % 5 === 0 && $i % 3 !== 0:
                echo 'Buzz ';
                break;
            case $i % 5 === 0 && $i % 3 === 0:
                echo 'FizzBuzz ';
                break;
            default:
                echo $i . ' ';
                break;
        }
        if($i % 20 === 0){
            echo PHP_EOL;
        }
    }

}

$number = readline('Max value? ');

FizzBuzz($number);
