<?php

echo 'Rock Paper Scissors!' . PHP_EOL . PHP_EOL;

$wins = 0;
$losses = 0;

$options = [
    1 => 'rock',
    2 => 'paper',
    3 => 'scissors',
    4 => 'lizard',
    5 => 'spock'
];

$winner = [

    'r' => [3,4],
    'p' => [1,5],
    's' => [2,4],
    'l' => [2,5],
    'spk' => [2,3]

];


while(true){
    $bestOf = (int) readline('Enter best of what you wanna play (number of rounds to win to win the game): ');
    if($bestOf % 2 !== 0){
        break;
    }
    readline('You must type odd number! Press ENTER!');
}

system('clear');

while(true){
    while(true){
        $computerChoice = (int) rand(1,5);
        $playerChoice = strtolower((string) readline('Enter r (rock), p (paper), s (scissors), l (lizard) or spk (spock)'));
        if($winner[$playerChoice]){
            break;
        }
        echo 'Invalid input. You must type r, p, s, l or spk!' . PHP_EOL;
    }


    if($options[$computerChoice] === $playerChoice){
        echo "Computer choose $options[$computerChoice]" . ' Tie!' . PHP_EOL;
    }
    if(in_array($computerChoice, $winner[$playerChoice])){
        echo "Computer choose $options[$computerChoice]" . ' You win!' . PHP_EOL;
        $wins++;
    }else{
        echo "Computer choose $options[$computerChoice]" . ' You lose!' . PHP_EOL;
        $losses++;
    }


    if ($wins > $bestOf / 2){
        echo "You won the game!" . PHP_EOL;
        exit;
    }else if($losses > $bestOf /2 ){
        echo "You lose the game!" . PHP_EOL;
        exit;
    }

}










