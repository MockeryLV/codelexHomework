<?php

class Product{

    private $price;

    private $amount;

    private $name;

    public function __construct(string $name, float $price, int $amount)
    {

        $this->price = $price;

        $this->name = $name;

        $this->amount = $amount;

    }

    public function print_product(): string{
        return "$this->name, price $this->price EUR, amount $this->amount units";
    }

    public function changePrice(float $price): void{
        $this->price = $price;
    }

    public function changeAmount(int $amount): void{
        $this->amount =  $amount;
    }

}


$products = [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1)
];

foreach ($products as $product){
    echo $product->print_product() . PHP_EOL;
}

$products[0]->changeAmount(1);
$products[0]->changePrice(100);

echo PHP_EOL . $products[0]->print_product() . PHP_EOL;