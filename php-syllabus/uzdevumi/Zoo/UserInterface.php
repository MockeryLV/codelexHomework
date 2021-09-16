<?php


class UserInterface{



    private static function printCompatibles(array $animals): void{
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

    private static function printNotCompatibles(array $animals): void{
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

    private static function printSpecifiedAnimals(array $animals, string $specify){
        foreach ($animals as $animal){
            if($animal->getStatus() === $specify){
                echo $animal->getName() . ' is ' . $specify . ' animal' . PHP_EOL;
            }
        }
    }

    public static function menu(array $animals){
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
}