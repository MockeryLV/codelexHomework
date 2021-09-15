<?php
class Pistol extends Gun {

    public function __construct(string $name, int $price)
    {
        parent::__construct($name, $price);
        $this->type = 'Pistol';
        $this->bulletWeight = 1;
    }


}