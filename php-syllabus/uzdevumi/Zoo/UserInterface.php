<?php


class UserInterface{



    public static function printCompatibles(array $animals): void{
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

    public static function printNotCompatibles(array $animals): void{
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

    public static function printSpecifiedAnimals(array $animals, string $specify){
        foreach ($animals as $animal){
            if($animal->getStatus() === $specify){
                echo $animal->getName() . ' is ' . $specify . ' animal' . PHP_EOL;
            }
        }
    }
}