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