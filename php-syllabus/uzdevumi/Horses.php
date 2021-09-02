<?php


class Runner
{
    public $coef;

    public $symbol;

    public $timeFinished = 0;

    public $location = 0;

    public function __construct(string $symbol, int $coef)
    {
        $this->coef = $coef;
        $this->symbol = $symbol;
    }

    public function getRunner()
    {
        return $this->symbol;
    }

    public function move()
    {
        $this->location += rand(1, 2);
    }

    public function resetRunner(){
        $this->location = 0;
        $this->timeFinished = 0;

    }
}

class Game
{

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

    public function GameReset(){
        $this->time = 0;
        $this->places = [];

        foreach ($this->runners as $runner){
            $runner->resetRunner();
        }


    }


    public function GameStart():bool
    {

        if ($this->isFinished()) {
            $this->listPlaces();
            return false;
        }

        $this->setLines();
        $this->printLines();

        $this->runnersMove();

        $this->time++;
        return true;
    }

    public function setLines()
    {

        foreach ($this->runners as $key => $runner) {

            $this->lanes[$key] = str_repeat('_', $this->laneLength - ($this->laneLength - $runner->location))
                . $runner->symbol . str_repeat('_', $this->laneLength - $runner->location);

        }
    }

    public function printLines()
    {
        foreach ($this->lanes as $lane) {
            echo $lane . PHP_EOL;
        }
    }

    public function runnersMove()
    {
        foreach ($this->runners as $runner) {
            if (!in_array($runner, $this->places)) {
                $runner->move();
                if ($runner->location >= $this->laneLength) {
                    $runner->location = $this->laneLength;
                    array_push($this->places, $runner);
                    $runner->timeFinished = $this->time;
                }
            }
        }
    }

    public function isFinished(): bool
    {
        foreach ($this->runners as $key => $runner) {
            if (!in_array($runner, $this->places)) {
                return false;
            }
        }
        return true;

    }

    public function listPlaces()
    {
        $n = 1;
        foreach ($this->places as $key => $place) {
            if ($place->timeFinished < @$this->places[$key + 1]->timeFinished) {
                echo $n . " place: " . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
                $n++;
            } else {
                echo $n . " place: " . $place->symbol . " ($place->timeFinished sec.)" . PHP_EOL;
            }

//
        }
    }

    public function listRunners(){
        foreach ($this->runners as $key => $runner){
            echo "$key: $runner->symbol (koef x$runner->coef)" . PHP_EOL;
        }
    }

}


class Player{

    public $balance;

    public $bets;
    public function __construct(int $balance)
    {
        $this->balance = $balance;
    }

    public function placeBet(int $amount, Runner $runner){
        if($this->balance >= $amount){
            $this->balance-=$amount;
            $this->bets["$runner->symbol"] = $amount;
        }else{
            echo 'Unable to bet due low balance!' . PHP_EOL;
        }

    }

    public function win(Runner $runner){
        $this->balance += $this->bets["$runner->symbol"] * $runner->coef;
        $this->bets = [];
    }

    public function lose(){
        $this->bets = [];
    }

}

class UserInterface{

    public static function BetMenu (Game $game, Player $player){
        system('clear');
        $game->listRunners();
        echo 'Balance: ' . $player->balance . "$" . PHP_EOL;
        while(true){
            $champion = (string) readline('Choose your champion: ');

            if($champion === ''){
                echo 'Invalid input!' . PHP_EOL;
                continue;
            }
            $champion = (int) $champion;
            if($champion <= count($game->runners) + 1){
                break;
            }
            else{
                echo 'Invalid input!' . PHP_EOL;
            }
        }

        $amount = (int) readline('Your bet: ');
        $player->placeBet($amount, $game->runners[$champion]);

        while(true){
            echo 'Balance: ' . $player->balance . "$" . PHP_EOL;
            $champion = (string) readline('Choose one more (or type done): ');
            if($champion === 'done'){
                break;
            }

            $champion = (int) $champion;

            if(array_key_exists($game->runners[$champion]->symbol, $player->bets)){
                readline('The champion has already taken!');
            }else{
                $amount = (int) readline('Your bet: ');
                $player->placeBet($amount, $game->runners[$champion]);
            }

        }

    }

    public static function winLoseMenu(Game $game, Player $player){

        if(array_key_exists($game->places[0]->symbol,$player->bets)){
            $player->win($game->places[0]);
            echo 'You win!' . PHP_EOL;
            echo "Balance $player->balance$" . PHP_EOL;
        }else{
            $player->lose();
            echo 'You lose!' . PHP_EOL;
        }

    }

    public static function Race(Game $game){
        while (true) {
            system('clear');
            $status = $game->GameStart();
            if(!$status){
                break;
            }
            usleep(50000);
        }
    }

}





$runners = [
    new Runner('X', 3),
    new Runner('#', 2),
    new Runner('*', 1),
    new Runner('A', 3),
    new Runner('B', 2),
    new Runner('C', 1),
    new Runner('1', 5),
    new Runner('2', 3),
    new Runner('3', 1),
];

$game = new Game($runners, 20);

$player = new Player(1000);

$userInterface = new UserInterface();

while(true){
    $userInterface::BetMenu($game, $player);
    $userInterface::Race($game);
    $userInterface::winLoseMenu($game, $player);
    $game->GameReset();
    readline('Enter to continue');
}
