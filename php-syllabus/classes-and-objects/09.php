<?php


class BankAccount{

    public string $name;

    public int $balance;

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function show_user_name_and_balance(): string{


        if($this->balance < 0){
            return $this->name . ', ' . '-$' . number_format(-1 * $this->balance, 2, '.', ',');
        }
            return $this->name . ', ' . '$' . number_format($this->balance, 2, '.', ',');

    }

}

$igor = new BankAccount('Igor', -7000);

echo $igor->show_user_name_and_balance() . PHP_EOL;