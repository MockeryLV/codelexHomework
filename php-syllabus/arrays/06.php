<?php

system('clear');

$wordArr = str_split(strtolower((readline("Enter your word: \n"))));

system('clear');

$hiddenword = str_repeat('_', count($wordArr));

$misses = [];


function printGrid(string $hiddenword, array $misses, array $wordArr) : string {
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;

    echo 'Lifes: ' . str_repeat('<3 ', 5 - count($misses)) . PHP_EOL . PHP_EOL;

    echo "Word: ". $hiddenword . PHP_EOL . PHP_EOL;

    echo "Misses: ";
    foreach ($misses as $miss){
        echo $miss. ' ';
    }
    echo PHP_EOL;
    checkState($hiddenword, $wordArr, $misses);
    echo PHP_EOL;
    return (string) readline("Guess: \n" );
}


function checkGuess(array $wordArr, string $guess, string $hiddenword): string {
    foreach ($wordArr as $key => $letter){
        if($guess === $letter){
            $hiddenword[$key] = $guess;
        }

    }
    return $hiddenword;
}

function checkState(string $hiddenword, array $wordArr, array $misses): void{
    if($hiddenword === join('', $wordArr)){
        echo PHP_EOL . 'YOU GOT IT!' . PHP_EOL;
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
        exit;
    }


    if(count($misses) > 4){
        echo PHP_EOL . 'Game Over!' . PHP_EOL;
        echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
        exit;
    }
}

while(true){

    while(true){
        system('clear');
        $guess = printGrid($hiddenword, $misses, $wordArr);

        if($guess === join('', $wordArr)){
            echo PHP_EOL . 'YOU GOT IT!' . PHP_EOL;
            echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
            exit;
        }

        if(strlen($guess) === 1){
            break;
        }
        echo 'You must type one letter or the whole word!' . "\n";
        readline('Press Enter to continue.');
    }

    $hiddenword = checkGuess($wordArr, $guess, $hiddenword);


    if(!in_array($guess, $wordArr)){
        array_push($misses, $guess);
    }

}