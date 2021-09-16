<?php

require_once 'Animal.php';
require_once 'Specie.php';
require_once 'UserInterface.php';



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
    echo '3: Print free animals' . PHP_EOL;
    echo '4: Print cage animals' . PHP_EOL;
    echo '5: Print terrarium animals' . PHP_EOL;

    $choose = (int) readline('Choose: ');
    system('clear');
    switch ($choose){
        case 1:
            UserInterface::printCompatibles($animals);
            break;
        case 2:
            UserInterface::printNotCompatibles($animals);
            break;
        case 3:
            UserInterface::printSpecifiedAnimals($animals, 'Free');
            break;
        case 4:
            UserInterface::printSpecifiedAnimals($animals, 'Cage');
            break;
        case 5:
            UserInterface::printSpecifiedAnimals($animals, 'Terrarium');
            break;
        default:
            echo 'Invalid input!' . PHP_EOL;
            break;
    }
}




