<?php
class UserInterface{

    private Marketplace $marketplace;

    public function __construct(Marketplace $marketplace)
    {
        $this->marketplace = $marketplace;
    }

    public function showBalance(): void{
        echo 'Balace: ' . number_format($this->marketplace->getUser()->getBalance(), '2', '.', ',') . "$" . PHP_EOL;
    }
    public function listCars(){
        foreach ($this->marketplace->getCars() as $key => $car){
            echo $key + 1  . ": {$car->getInfo()['brand']} {$car->getInfo()['model']}: {$car->getInfo()['price']}$" . PHP_EOL;
        }
    }

    public function showCarInfo(Car $car){
        $info = $this->marketplace->getCarInfo($car);

        echo "Brand: {$info['brand']}" . PHP_EOL;
        echo "Model: {$info['model']}" . PHP_EOL;
        echo "Engine: {$info['engine']}" . PHP_EOL;
        echo "Volume: " . $info['volume'] . PHP_EOL;
        echo "Price: {$info['price']}$" . PHP_EOL;


    }

    public function buyCar(int $car){
        if($this->marketplace->getUser()->getBalance() >= $this->marketplace->getCars()[$car]->getInfo()['price']){
            echo 'You have bougth the car!' . PHP_EOL;
            $this->marketplace->getUser()->buyCar($this->marketplace->getCars()[$car]);
            $this->marketplace->sellCar($car);
            readline();
        }else{
            echo 'Insufficient balance!' . PHP_EOL;
            readline();
        }
    }
}