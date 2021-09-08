<?php


class Car{

    private string $brand;

    private string $model;

    private int $price;

    private int $volume;

    private string $engine;

    private int $mileage;

    public function __construct(string $brand, string $model, int $price, int $volume, string $engine, int $mileage)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->price = $price;
        $this->volume =  $volume;
        $this->engine = $engine;
        $this->mileage = $mileage;
    }

    public function getInfo(): array{
        return [
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'volume' => round($this->volume / 1000, 1),
            'engine' => $this->engine,
            'mileage' => $this->mileage
        ];
    }


}


class User{

    private int $balance;

    private array $cars = [];

    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance(): int{
        return $this->balance;
    }

    public function buyCar(Car $car): void{
        $this->balance-=$car->getInfo()['price'];
        array_push($this->cars, $car);
    }


}


class Marketplace{

    private array $cars;

    private User $user;

    public function __construct(array $cars, User $user)
    {
        $this->cars = $cars;
        $this->user = $user;
    }

    public function getCars(): array{
        return $this->cars;
    }

    public function getUser(): User{
        return $this->user;
    }

    public function getCarInfo(Car $car){
        return $car->getInfo();
    }

    public function sellCar(int $carId): void{
        array_splice($this->cars, $carId, 1);

    }

}


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
    $input = (string) readline('Buy? y/n: ');
    if($input === 'y' || $input === 'n'){
        return $input;
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