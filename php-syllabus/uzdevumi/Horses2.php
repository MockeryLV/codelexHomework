<?php


class Horse{

    private string $symbol;

    private int $location = 0;

    public function __construct(string $symbol)
    {
        $this->symbol = $symbol;
    }

    public function getSymbol(): string{
        return $this->symbol;
    }

    public function getLocation(): int{
        return $this->location;
    }

    public function move(): void{
        $this->location+=rand(1,3);
    }

    public function setLocation(int $location): void
    {
        $this->location = $location;
    }
}

class Lane{

    private int $length;

    private Horse $horse;

    public function __construct(int $length, Horse $horse)
    {
        $this->length = $length;
        $this->horse = $horse;
    }

    public function getLane(){
        return str_repeat('_', $this->length - ($this->length - $this->horse->getLocation()))
            . $this->horse->getSymbol() . str_repeat('_', $this->length - $this->horse->getLocation());
    }

    public function move(): void{
            $this->horse->move();
            if($this->horse->getLocation() > $this->length){
                $this->horse->setLocation($this->length);
            }
    }


}

class Game{

    private array $places = [];

    private int $time = 0;

    public array $lanes = [];

    private int $laneLength;
    public function __construct(int $laneLength)
    {
        $this->laneLength = $laneLength;
    }

    public function printLanes(): void{
        foreach($this->lanes as $lane){
            echo $lane->getLane() . PHP_EOL;
        }
    }

    public function initializeLane(string $symbol): void{

        array_push($this->lanes, new Lane($this->laneLength, new Horse($symbol)));

    }

    public function changeFrame(): void{
        foreach ($this->lanes as $lane){
            $lane->move();
        }
    }

    public function getTime():int{
        return $this->time;
    }



}

$game = new Game(20);

$game->initializeLane('$');
$game->initializeLane('#');
$game->initializeLane('%');
$game->initializeLane('1');
$game->initializeLane('2');
$game->initializeLane('3');
$game->initializeLane('A');
$game->initializeLane('B');
$game->initializeLane('C');


while(true){
    system('clear');
    $game->printLanes();
    $game->changeFrame();
    sleep(1);
}



