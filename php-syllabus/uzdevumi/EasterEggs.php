<?php


class Egg {

    private $name;

    private $hp = 2;

    private $chance;

    public function __construct(string $name)
    {
        $this->name = $name;

        $this->chance = rand(1,100);

    }


    public function getEgg(){
        return [
            'name' => $this->name,
            'hp' => $this->hp,
            'chance' => $this->chance
        ];
    }

    public function eggHit(){
        $this->hp -= 1;
    }

    public function isAlive(){
        if($this->hp){
            return true;
        }
        return false;
    }

}

class Game{



    public static function fight(Egg $fighter, Egg $enemie): Egg{

        while($enemie->isAlive() && $fighter->isAlive()){
            system('clear');

            echo $fighter->getEgg()['name'] .' hp: ' . $fighter->getEgg()['hp'] . PHP_EOL;
            echo $enemie->getEgg()['name'] . ' hp: ' . $enemie->getEgg()['hp'] . PHP_EOL;

            $fighterChance = rand($fighter->getEgg()['chance'], 100);
            $enemieChance = rand($enemie->getEgg()['chance'], 100);
            readline('Press Enter to hit!');

            if($fighterChance > $enemieChance){
                $enemie->eggHit();
            }elseif($enemieChance > $fighterChance){
                $fighter->eggHit();
            }else{
                $enemie->eggHit();
                $fighter->eggHit();
            }
        }
        system('clear');

        echo $fighter->getEgg()['name'] .' hp: ' . $fighter->getEgg()['hp'] . PHP_EOL;
        echo $enemie->getEgg()['name'] . ' hp: ' . $enemie->getEgg()['hp'] . PHP_EOL;

        if(!$fighter->isAlive()){
            return $enemie;
        }else{
            return $fighter;
        }

    }

    public static function CreateEgg(): Egg{
        $name = (string) readline('Enter Eggs name: ');
        return new Egg($name);
    }

    public static function chooseOpponent(array $enemies): Egg{
        foreach ($enemies as $key => $enemy){
            if($enemy->isAlive()){
                echo "$key: " . $enemy->getEgg()['name'] . PHP_EOL;
            }

        }
        while(true){
            $n = readline('Choose your opponent: ');
            if(isset($enemies[$n])){
                return $enemies[$n];
            }
            echo 'Invalid Input!' . PHP_EOL;
        }
    }

    public static function changeEgg(Egg $player): Egg{
        $input = (string) readline('Maybe you wanna take new egg? (y/n)');
        if($input === 'y'){
            return Game::CreateEgg();
        }else if($input === 'n'){
            if(!$player->isAlive()){
                exit;
            }
            return $player;
        }else{
            if(!$player->isAlive()){
                readline('I will take it as no...');
                exit;
            }
            readline('I will take it as no...');
            return $player;
        }
    }
}



$enemies = [
    new Egg('Sword'),
    new Egg('Shaker'),
    new Egg('Imp')
];


$player = Game::CreateEgg();

while(true){

    system('clear');

    $opponent = Game::chooseOpponent($enemies);

    $winner = Game::fight($player, $opponent)->getEgg();

    if($winner['name'] === $opponent->getEgg()['name']){
        echo 'You lose!' . PHP_EOL;
        $player = Game::changeEgg($player);
    }else{
        readline( 'Congrats!!! You win!' );
        $player = Game::changeEgg($player);
    }



}