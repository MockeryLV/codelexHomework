<?php


class FuelGauge {

    public int $fuelLevel;

    public function __construct(int $fuelLevel = 0)
    {
        $this->fuelLevel = $fuelLevel;
    }


    public function printFuel(): int{

        return $this->fuelLevel;

    }

    public function puttingFuel(int $litres = 1): void{
        if($this->fuelLevel < 70){
            $this->fuelLevel+=$litres;
        }
        echo 'Putting fuel: ' . $litres . ' litres' . PHP_EOL;
    }

    public function burningFuel(): void{
        if($this->fuelLevel > 0){
            $this->fuelLevel-=1;
        }
    }
}

class Odometer {

    public int $mileage;

    private int $startMileage;

    public function __construct(int $mileage = 0)
    {
        $this->mileage = $mileage;
        $this->startMileage = $mileage;
    }


    public function printMileage(): int{

        return $this->mileage;

    }

    public function addMile(): void{
        if($this->mileage <999999){
            $this->mileage+=1;
        }else{
            $difference =  $this->mileage - $this->startMileage + 1;
            $this->mileage = 0;
            $this->startMileage = $this->mileage - $difference;
        }

    }

    public function fuelEconomy(FuelGauge $fuelGauge): void{
        if($this->mileage - $this->startMileage >= 10){
            $this->startMileage = $this->mileage;
            $fuelGauge->burningFuel();
        }
    }

}


$fuelGauge = new FuelGauge(3);

$odometer = new Odometer(0);

function carDrive(int $km, FuelGauge $fuelGauge, Odometer $odometer, int $litresToPut){

    $design = ['oПo'];

    while($km > 0){
        system('clear');

        echo 'Fuel amount (litres): ' . $fuelGauge->printFuel() . PHP_EOL;
        echo 'Current mileage is: ' . $odometer->printMileage() . PHP_EOL;
        echo 'Km to go: ' . $km . PHP_EOL;


//                              Animation of the car driving
        if(count($design) < 5){
            foreach ($design as $item){
                echo $item;
            }
            array_unshift($design, '.');
        }else {
            foreach ($design as $item){
                echo $item;
            }
            $design = ['oПo'];
        }
        echo PHP_EOL;
//                              Animation of the car driving ^^^


        if($fuelGauge->fuelLevel > 0){
            $odometer->fuelEconomy($fuelGauge);
            $odometer->addMile();
        }else{
            $fuelGauge->puttingFuel($litresToPut);
            $odometer->addMile();
        }
        echo PHP_EOL;

        usleep(50000);
        $km--;

    }
    system('clear');

    echo 'Fuel amount (litres): ' . $fuelGauge->printFuel() . PHP_EOL;
    echo 'Current mileage is: ' . $odometer->printMileage() . PHP_EOL;
    echo 'You have reached your destination!' . PHP_EOL;

}

carDrive(50, $fuelGauge, $odometer, 5);


