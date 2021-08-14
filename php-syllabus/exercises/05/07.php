<?php


class Gun {

    public $license;

    public $price;

    public $name;

    public function __construct($license, $price, $name)
    {
        $this->name = $name;
        $this->license = $license;
        $this->price = $price;

    }

}

class Person {

    public $name;

    public $licenses;

    public $cash;


    public function __construct($name, $licenses, $cash)
    {

        $this->name = $name;
        $this->licenses = $licenses;
        $this->cash = $cash;

    }

}

$person = new Person(
    'John',
    ['TTs'],
    5999
);


$guns = [

    new Gun('TTs', 500, 'Uzi'),
    new Gun('Rifles', 700, 'Ak-47'),
    new Gun('Rifles', 1200, 'AWP'),

];



echo 'Welcome to the Gun Shop ' . $person->name . '!' . PHP_EOL;
echo 'Here is our gun list. What gun are you willing to buy?' . PHP_EOL;

while(true){
    system('clear');
    foreach ($guns as $key => $gun){
        echo "$key | $gun->name costs $gun->price$" . PHP_EOL;
    }
    $userInput = readline('What do you choose?: ');

    if(array_key_exists($userInput, $guns)){
        if(in_array( $guns[$userInput]->license, $person->licenses) && $person->cash >= $guns[$userInput]->price){
            echo 'Congrats! You just bought ' . $guns[$userInput]->name . ' Have a nice day!' . PHP_EOL;
            return false;
        }
        else{
            echo 'You cannot buy the gun!' . PHP_EOL;
            return false;
        }
    }
    readline('Your input was incorrect!. Press enter to try again.');

}



