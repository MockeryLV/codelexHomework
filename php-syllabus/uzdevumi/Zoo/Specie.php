<?php

class Specie implements Animal{

    private string $name;

    private string $status;


    public function __construct(string $name,string $status)
    {
        $this->name = $name;
        $this->status = $status;
    }

    public static function isCompatible(Animal $a, Animal $b): string
    {
        if ($a->getStatus() === $b->getStatus()){
            return 'Compatible';
        }
        return 'Not compatible';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatus(): string
    {
        return $this->status;
    }


}