<?php


require 'Models/Car.php';

require 'Models/Marketplace.php';

require 'Models/User.php';

require 'Models/UserInterface.php';


$cars = [
    new Car('Audi', 'A4', 1400, 1900, 'diesel', 390000),
    new Car('Audi', 'A6', 1800, 2500, 'diesel', 250000),
    new Car('Audi', 'A8', 4000, 3000, 'diesel', 100000),
    new Car('BMW', '530', 2500, 3000, 'diesel', 500000),
    new Car('Ford', 'Fiesta', 275, 1300, 'gasoline', 170000),
    new Car('Volkswagen', 'Passat', 700, 1600, 'gasoline/gas', 900000),
];

$user = new User(10000);

$marketplace = new Marketplace($cars, $user);

$userinterface = new UserInterface($marketplace);

function getCarInput(array $cars){
    while(true){
        $input = (string) readline('Choose car: ');

        if(!is_numeric($input)){
            echo 'Invalid input' . PHP_EOL;
            continue;
        }
        $input = (int) $input;
        $input-=1;
        if($input < 0 || $input >= count($cars)){
            echo 'Invalid input' . PHP_EOL;
            continue;
        }
        system('clear');
        return $input;
    }
}

function getBuyOrNo(): string{
    while(true){
        $input = (string) readline('Buy? y/n: ');
        if($input === 'y' || $input === 'n'){
            return $input;
        }
    }
}


while(true){
    system('clear');
    $userinterface->showBalance();
    $userinterface->listCars();
    $car = getCarInput($marketplace->getCars());
    $userinterface->showCarInfo($marketplace->getCars()[$car]);
    if(getBuyOrNo() === 'n'){
        continue;
    }else{
        $userinterface->buyCar($car);
    }

}