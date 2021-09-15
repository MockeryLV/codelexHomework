<?php

class GunStore{

    private array $guns;

    public function __construct(array $guns)
    {
        $this->guns = $guns;
    }

    public function printGuns(){
        foreach ($this->guns as $key => $gun){
            /**
             * @var Gun $gun
             */
            echo $key. ": " . $gun->getGun() . PHP_EOL;
        }
    }

    /**
     * @return array
     */
    public function getGuns(): array
    {
        return $this->guns;
    }

}