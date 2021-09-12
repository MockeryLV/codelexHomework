<?php


class Product{

    private string $name;
    private int $price;
    private int $quantity;

    public function __construct(string $name, int $price, int $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(): string{
        return $this->name;
    }


    public function getPrice(): int
    {
        return $this->price;
    }


    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }


    public function setPrice(int $price): void
    {
        $this->price = $price;
    }


    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getProduct(): array{
        return [
            $this->getName(),
            $this->getPrice(),
            $this->getQuantity()
        ];
    }
}
