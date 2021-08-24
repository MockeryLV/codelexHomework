<?php


echo 'Welcome to Piglet!' . PHP_EOL;

$total = 0;

while(true){

    $n = round(rand(1, 6), 0);

    if($n == 1){
        $total = 0;
        echo "You rolled $n!" . PHP_EOL . "You got $total points." . PHP_EOL;
        break;
    }

    $total = $total + $n;

    echo "You rolled $n!" . PHP_EOL ;

    while(true){
        $input = strtolower((string) readline('Roll again? '));
        if($input === "no" || $input === "n"){
            echo "You got $total points." . PHP_EOL;
            exit;
        }elseif ($input === 'yes' || $input === 'y'){
            break;
        }else{
            readline('Wrong input, type no/n or yes/y! Press Enter to try again!');
            continue;
        }
    }


}
