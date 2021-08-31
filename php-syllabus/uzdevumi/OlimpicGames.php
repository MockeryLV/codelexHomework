<?php


class Runner{

    public $symbol;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function getRunner(){
        return $this->symbol;
    }

}


class Game {

    public $lanes;

    public $runners;

    public function __construct($runners)
    {

        $this->runners = $runners;

    }

    public function GameStart(){



    }


}


$runners = [
    new Runner('X'),
    new Runner('#'),
    new Runner('*'),
];

$game = new Game($runners);

$game->GameStart();