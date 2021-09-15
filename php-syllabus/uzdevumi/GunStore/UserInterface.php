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
        echo 'Your cash: ' . $this->user->getWallet()->getCash()->getBalance() . "$" . PHP_EOL;
        echo 'Your card: ' . $this->user->getWallet()->getCard()->getBalance() . "$" . PHP_EOL;
        echo 'Your paypal: ' . $this->user->getWallet()->getPaypal()->getBalance() . "$" . PHP_EOL;
        $this->gunStore->printGuns();

    }

    public function selectGun(): Gun{
        while(true){

            $choose = (int) readline('Choose gun to buy: ');

            if(isset($this->gunStore->getGuns()[$choose])){
                return $this->gunStore->getGuns()[$choose];
            }
            echo 'Incorrect input!' . PHP_EOL;
        }

    }

    public function payCash($amount){

        if($amount <= $this->user->getWallet()->getCash()->getBalance()){
            $this->user->getWallet()->getCash()->withdrowal($amount);
            readline('Thanks!');
        }else{
            echo 'Not enough money!' . PHP_EOL;
        }

    }

    public function payCard($amount){

        while(true){
            $pin = (int )readline('Enter pin: ');

            if($pin === $this->user->getWallet()->getCard()->getPin()){
                if($amount <= $this->user->getWallet()->getCard()->getBalance()){
                    $this->user->getWallet()->getCard()->withdrowal($amount);
                    readline('Thanks!');
                    break;
                }
                else{
                    echo 'Not enough money!' . PHP_EOL;
                    break;
                }
            }
            else{
                echo 'Incorrect pin!' . PHP_EOL;
                continue;
            }
        }
    }

    public function payPaypal($amount): void{
        while(true){
            $email = readline('Enter email: ');
            $pwd = readline('Enter password: ');
            if($email === $this->user->getWallet()->getPaypal()->getEmail() && $pwd === $this->user->getWallet()->getPaypal()->getPwd()){
                if($amount <= $this->user->getWallet()->getPaypal()->getBalance()){
                    $this->user->getWallet()->getPaypal()->withdrowal($amount);
                    readline('Thanks!');
                    break;
                }else{
                    echo 'Not enough money!' . PHP_EOL;
                    break;
                }

            }else{
                echo 'Incorrect email or password!' . PHP_EOL;
                continue;
            }

        }

    }

    public function selectPaymentMethod(Gun $gun): void{
        echo '1: Pay in cash (' . "Balance: {$this->user->getWallet()->getCash()->getBalance()}$" .')' . PHP_EOL;
        echo '2: Pay in card (' . "Balance: {$this->user->getWallet()->getCard()->getBalance()}$" .')' . PHP_EOL;
        echo '3: Pay in paypal (' . "Balance: {$this->user->getWallet()->getPaypal()->getBalance()}$" .')' . PHP_EOL;

        $choose = (int)  readline('Select Payment Method: ');

        switch ($choose){
            case 1:
                $this->payCash($gun->getPrice());
                break;
            case 2:
                $this->payCard($gun->getPrice());
                break;
            case 3:
                $this->payPaypal($gun->getPrice());
                break;
            default:
                echo 'Incorrect input!' . PHP_EOL;
        }
    }

    public function openGun(Gun $gun){

        system('clear');
        echo 'Buying menu: ' . PHP_EOL. PHP_EOL;
        echo $gun->getGun() . PHP_EOL . PHP_EOL;
        $this->selectPaymentMethod($gun);

    }
}