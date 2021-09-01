<?php


class Player{

    private $name;

    private $level;

    private $hp;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string{
        return $this->name;
    }

}