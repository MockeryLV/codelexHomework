<?php

function printCompatibles(array $animals){
    foreach ($animals as $animal){
        foreach ($animals as $a){
            if($animal->getName() !== $a->getName()){
                if($a->getStatus() === $animal->getStatus()){
                    echo $animal->getName() . " and " . $a->getName() . " are " . Specie::isCompatible($animal, $a) . PHP_EOL;
                }
            }
        }
        array_splice($animals,array_search($animal, $animals), 1);
    }
}

function printNotCompatibles(array $animals){
    foreach ($animals as $animal){
        foreach ($animals as $a){
            if($animal->getName() !== $a->getName()){
                if($a->getStatus() !== $animal->getStatus()){
                    echo $animal->getName() . " and " . $a->getName() . " are " . Specie::isCompatible($animal, $a) . PHP_EOL;
                }
            }
        }
        array_splice($animals,array_search($animal, $animals), 1);
    }
}
