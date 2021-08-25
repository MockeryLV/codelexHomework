<?php


echo 'Rock Paper Scissors!' . PHP_EOL . PHP_EOL;


$wins = 0;
$losses = 0;


while(true){
    $bestOf = (int) readline('Enter best of what you wanna play (number of rounds to win to win the game): ');
    if($bestOf % 2 !== 0){
        break;
    }
    readline('You must type odd number! Press ENTER!');
}




system('clear');

for($i = 1; $i <= $bestOf; $i++){
    while(true){
        $computerChoice = (int) rand(1,3);
        $playerChoice = strtolower((string) readline('Enter r (rock), p (paper) or s (scissors)'));
        if($playerChoice === 'r' || $playerChoice === 's' || $playerChoice === 'p'){
            break;
        }
        echo 'Invalid input. You must type r, p or s!' . PHP_EOL;
    }

    switch (true){
        case $playerChoice === 'r' && $computerChoice === 1:
            echo 'Tie! Computer choose rock!' . PHP_EOL;
            break;
        case $playerChoice === 'r' && $computerChoice === 2:
            echo 'Lose! Computer choose paper!'. PHP_EOL;
            $losses++;
            break;
        case $playerChoice === 'r' && $computerChoice === 3:
            echo 'Win! Computer choose scissors!'. PHP_EOL;
            $wins++;
            break;
        case $playerChoice === 'p' && $computerChoice === 1:
            echo 'Win! Computer choose rock!'. PHP_EOL;
            $wins++;
            break;
        case $playerChoice === 'p' && $computerChoice === 2:
            echo 'Tie! Computer choose paper!'. PHP_EOL;
            break;
        case $playerChoice === 'p' && $computerChoice === 3:
            echo 'Lose! Computer choose scissors!'. PHP_EOL;
            $losses++;
            break;
        case $playerChoice === 's' && $computerChoice === 1:
            echo 'Lose! Computer choose rock!'. PHP_EOL;
            $losses++;
            break;
        case $playerChoice === 's' && $computerChoice === 2:
            echo 'Win! Computer choose paper!'. PHP_EOL;
            $wins++;
            break;
        case $playerChoice === 's' && $computerChoice === 3:
            echo 'Tie! Computer choose scissors!'. PHP_EOL;
            break;
        default:
            echo 'ERROR' . PHP_EOL;
            break;
    }

    if ($wins > $bestOf / 2){
        echo "You won the game!" . PHP_EOL;
        exit;
    }else if($losses > $bestOf /2 ){
        echo "You lose the game!" . PHP_EOL;
        exit;
    }

}










