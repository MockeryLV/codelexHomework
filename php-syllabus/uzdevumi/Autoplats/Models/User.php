<?php

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