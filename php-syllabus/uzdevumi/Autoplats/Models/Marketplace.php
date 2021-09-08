<?php
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