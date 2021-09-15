<?php


class Rifle extends Gun {

    public function __construct(string $name, int $price)
    {
        parent::__construct($name, $price);
        $this->type = 'Rifle';
        $this->bulletWeight = 2;
    }

}