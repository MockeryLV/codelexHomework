<?php

require 'Enemies/Enemies.php';

require 'Player.php';

$saves = file('saves.txt');



if(!$saves){
    $name = readline('Enter name:');

    $player = new Player($name);

}else{
    $name = $saves;
    echo $name . PHP_EOL;

}

