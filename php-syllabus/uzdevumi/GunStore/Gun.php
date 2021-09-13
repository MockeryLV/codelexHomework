<?php

class Gun{

    protected string $name;
    protected int $price;
    protected string $type;
    protected int $bulletWeight;

    public function __construct(string $name, int $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    protected function calculateBulletBehavior(): int{
        return $this->bulletWeight * 10 / 3;
    }

    public function getGun(): string{
        return "$this->type: $this->name - $this->price$ - furmula({$this->calculateBulletBehavior()})";
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }
}