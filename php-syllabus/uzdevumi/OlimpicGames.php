<?php


class Runner{

    public $symbol;

    public $timeFinished = 0;

    public $location = 0;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function getRunner(){
        return $this->symbol;
    }

    public function move(){
        $this->location+=rand(1,2);
    }


}


class Game {

    public $lanes;

    public $runners;

    public $places = [];

    public $laneLength = 10;

    public $time = 0;

    public function __construct($runners, int $laneLength)
    {
        $this->laneLength = $laneLength;
        $this->runners = $runners;

    }

    public function GameStart(){

        if($this->isFinished()){
            $this->listPlaces();
            exit;
        }

        $this->setLines();
        $this->printLines();

        $this->runnersMove();

        $this->time++;

    }

    public function setLines(){
        foreach ($this->runners as $key => $runner){

            $this->lanes[$key] = str_repeat('_', $this->laneLength - ($this->laneLength - $runner->location))
                . $runner->symbol . str_repeat('_', $this->laneLength - $runner->location)
            ;

        }
    }


    public function printLines(){
        foreach ($this->lanes as $lane){
            echo $lane . PHP_EOL;
        }
    }


    public function runnersMove(){
        foreach ($this->runners as $runner){
            if(!in_array($runner, $this->places)){
                $runner->move();
                if($runner->location >= $this->laneLength){
                    $runner->location = $this->laneLength;
                    array_push($this->places, $runner);
                    $runner->timeFinished = $this->time;
                }
            }
        }
    }


    public function isFinished(): bool{
        foreach($this->runners as $key => $runner){
            if(!in_array($runner ,$this->places)){
                return false;
            }
        }
        return true;

    }

    public function listPlaces(){
        $n = 1;
        foreach ($this->places as $key => $place){
            if($place->timeFinished < @$this->places[$key +1 ]->timeFinished){
                echo $n . " place: " . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
                $n++;
            }else{
                echo $n . " place: " . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
            }

//
        }
    }
}


$runners = [
    new Runner('X'),
    new Runner('#'),
    new Runner('*'),
    new Runner('A'),
    new Runner('B'),
    new Runner('C'),
    new Runner('1'),
    new Runner('2'),
    new Runner('3'),
];

$game = new Game($runners, 30);


while(true){
    system('clear');
    $game->GameStart();
    usleep(500000);
}
