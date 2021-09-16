<?php

require_once 'Animal.php';
require_once 'Specie.php';
require_once 'functions.php';




$animals = [
    new Specie('Tiger', 'Cage'),
    new Specie('Lion', 'Cage'),
    new Specie('Zebra', 'Free'),
    new Specie('Spider', 'Terrarium'),
    new Specie('Stag', 'Free'),
    new Specie('Lizard', 'Terrarium')
];



while(true){
    echo '1: Print compatible animals' . PHP_EOL;
    echo '2: Print not compatible animals' . PHP_EOL;

    $choose = (int) readline('Choose: ');
    system('clear');
    switch ($choose){
        case 1:
            printCompatibles($animals);
            break;
        case 2:
            printNotCompatibles($animals);
            break;
        default:
            echo 'Invalid input!' . PHP_EOL;
            break;
    }
}




