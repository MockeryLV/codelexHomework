<?php


class UserInterface{

    private GunStore $gunStore;
    private User $user;

    public function __construct(GunStore $gunStore, User $user)
    {
        $this->gunStore = $gunStore;
        $this->user = $user;
    }

    public function mainMenu(): void{

        echo 'Welcome to our gun store!' . PHP_EOL;
        echo 'Your balance: ' . $this->user->getCash() . "$" . PHP_EOL;
        $this->gunStore->printGuns();
        $choose = (int) readline('Choose a gun: ');

        if(in_array($this->gunStore->getGuns()[$choose]->getType(), $this->user->getLicenses())){
            if($this->user->getCash() >= $this->gunStore->getGuns()[$choose]->getPrice()){
                $this->user->setCash($this->gunStore->getGuns()[$choose]->getPrice());
                echo 'Thanks for buying!' . PHP_EOL;
            }else{
                echo 'You do not have enough money!' . PHP_EOL;
            }

        }else{
            echo 'You do not have proper license!' . PHP_EOL;
        }


    }

}