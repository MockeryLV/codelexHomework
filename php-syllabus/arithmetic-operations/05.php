<?php


system('clear');

$number = rand(1, 100);


echo "I'm thinking of a number between 1-100.  Try to guess it.". PHP_EOL;

$guess = (int) readline(">" . PHP_EOL) ;


switch(true){
    case $guess < 1:
        echo 'Incorrect input.' . PHP_EOL;
        break;
    case $number ===  $guess:
        echo 'You guessed it!  What are the odds?!?'. PHP_EOL;
        break;
    case $guess > $number:
        echo "Sorry, you are too high.  I was thinking of $number.". PHP_EOL;
        break;
    case $guess < $number:
        echo "Sorry, you are too low.  I was thinking of $number." . PHP_EOL;
        break;
}