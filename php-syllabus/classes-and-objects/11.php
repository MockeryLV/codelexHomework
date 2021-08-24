<?php


class Account{

    public $name;

    public $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function balance(): string{
        return number_format($this->balance, '2', '.', ',');
    }

    public function deposit(int $money): void{
        $this->balance += $money;
    }


    public function withdrawal(int $money): void{
        $this->balance -= $money;
    }
    public static function transfer(Account $from, Account $to, int $howMuch) {
        $from->withdrawal($howMuch);
        $to->deposit($howMuch);
    }
}


//$bartos_account = new Account("Barto's account", 100.00);
//$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);
//
//echo "Initial state" . PHP_EOL;
//echo "$bartos_account->name, $bartos_account->balance$" . PHP_EOL;
//echo "$bartos_swiss_account->name, $bartos_account->balance$" . PHP_EOL;
//
//$bartos_account->withdrawal(20);
//echo "Barto's account balance is now: " . "{$bartos_account->balance()}$" . PHP_EOL;
//$bartos_swiss_account->deposit(200);
//echo "Barto's Swiss account balance is now: "."{$bartos_swiss_account->balance()}$" . PHP_EOL;
//
//echo "Final state" . PHP_EOL;
//echo "$bartos_account->name, $bartos_account->balance$" . PHP_EOL;
//echo "$bartos_swiss_account->name, $bartos_account->balance$" . PHP_EOL;



//$account = new Account('Account', 100.0);
//$account->deposit(20.0);
//echo "{$account->name}: {$account->balance()}$" . PHP_EOL;


//$Matt = new Account("Matt's account", 1000);
//
//$Mine = new Account("My account", 0);
//
//$Matt->withdrawal(100.0);
//$Mine->deposit(100.0);
//
//echo "{$Matt->name}: {$Matt->balance()}$" . PHP_EOL;
//echo "{$Mine->name}: {$Mine->balance()}$" . PHP_EOL;


$A =  new Account('A', 100.0);
$B =  new Account('B', 0.0);
$C =  new Account('C', 0.0);

Account::transfer($A, $B, 50);
Account::transfer($B, $C, 25);

echo "{$A->name}: {$A->balance()}$" . PHP_EOL;
echo "{$B->name}: {$B->balance()}$" . PHP_EOL;
echo "{$C->name}: {$C->balance()}$" . PHP_EOL;



