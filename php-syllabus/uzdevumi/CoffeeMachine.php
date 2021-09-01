<?php


class Coin{

    public $nominal;

    public function __construct($nominal)
    {
        $this->nominal = $nominal;
    }



}


class Wallet{

    public $coins = [];

    public function __construct($coins)
    {

        foreach ($coins as $coin){
            $this->coins["$coin->nominal"] = 1;
        }

    }

    public function listWallet(){
        foreach ($this->coins as $key => $coin){
            echo $key . " cents: $coin pieces" . PHP_EOL;
        }
    }

    public function withdraw($coin){
        $this->coins["$coin"]--;
    }

    public function cashBack($coin){
        $this->coins["$coin"]++;
    }


}

class Counter{

    public $balance = 0;


    private function insertCoin($coin, Wallet $wallet){
        $this->balance+=$coin;
        $wallet->withdraw($coin);
    }

    private function giveChange(Coffee $coffee, Wallet $wallet){
        $change = $this->balance - $coffee->price;

        while($change !== 0){
            foreach (array_keys($wallet->coins) as $key){
                if($change === $key){
                    $wallet->cashBack($key);
                    echo 'Have your ' . $key. ' cents!' . PHP_EOL;
                    $change = 0;
                }elseif($change > $key){
                    $wallet->cashBack($key);
                    echo 'Have your ' . $key. ' cents!' . PHP_EOL;
                    $change-=$key;
                }
                else{
                    continue;
                }
            }
        }


    }

    public function CountForCoffee(Coffee $coffee, Wallet $wallet){
        system('clear');
        while($this->balance < $coffee->price ){
            system('clear');
            echo $coffee->name . "'s price: $coffee->price cents" . PHP_EOL . PHP_EOL;

            $wallet->listWallet();
            echo PHP_EOL;
            echo 'Balance: ' . $this->balance . ' cents' . PHP_EOL;

            $coin = (string) readline('Choose coin to insert (/back/ to go back to menu): ');
            if($coin === 'back'){
                break;
            }
            $coin =  (int) $coin;
            $arrKeys = array_keys($wallet->coins);
            if(in_array($coin, $arrKeys)){
                if($wallet->coins["$coin"] > 0){
                    $this->insertCoin($coin, $wallet);
                }
                else{
                    readline('You dont have ' . $coin . ' cent coins anymore!');
                }
            }else{
                readline('There is not coin with nominal of: ' . $coin . ' cents!');
            }

        }

        if($coin === 'back'){
            echo 'Thanks!' . PHP_EOL;
        }else{
            if($this->balance > $coffee->price){
                $this->giveChange($coffee, $wallet);
            }
            readline( 'Thanks for buying ' . $coffee->name . "! Have a nice one!" . PHP_EOL);
            $this->balance = 0;
        }

    }
}

class Coffee{

    public $name;

    public $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}




class CoffeeMachine{

    public $wallet;

    public $coins;

    public $counter;

    public $coffees;


    public function __construct($wallet, $coins, $counter, $coffees)
    {
        $this->wallet = $wallet;
        $this->coins = $coins;
        $this->counter = $counter;
        $this->coffees = $coffees;
    }


    public function listDrinks(){
        foreach ($this->coffees as $key => $coffee){
            echo "$key: $coffee->name - " . $coffee->price / 100 . '$' . PHP_EOL;
        }
    }


    public function chooseDrink(): Coffee{
        echo 'Available drinks: ' . PHP_EOL;
        $this->listDrinks();

        echo PHP_EOL;
        $choose =  (int) readline('Choose a drink please: ');
        while(!array_key_exists($choose, $this->coffees)){
            echo 'Invalid input!' . PHP_EOL;
            $choose =  (int) readline('Choose a drink please: ');
        }

        return $this->coffees[$choose];
    }

    public function buyingDrink(Coffee $coffee, Counter $counter){
        $counter->CountForCoffee($coffee, $this->wallet);
    }

}



$coins = [
    new Coin(5),
    new Coin(10),
    new Coin(20),
    new Coin(50),
    new Coin(100),
    new Coin(200)
];

$coffees = [
    new Coffee('Latte', 150),
    new Coffee('Espresso', 100),
    new Coffee('Cappucino', 200),
    new Coffee('Tea', 50),
    new Coffee('Cocao', 70)
];

$wallet = new Wallet($coins);

$counter = new Counter();

$coffeeMachine = new CoffeeMachine($wallet, $coins, $counter, $coffees);

while(true){
    system('clear');
    $coffee = $coffeeMachine->chooseDrink();
    $coffeeMachine->buyingDrink($coffee, $counter);
}