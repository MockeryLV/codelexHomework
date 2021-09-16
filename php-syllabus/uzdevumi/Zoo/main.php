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
    UserInterface::menu($animals);
}




