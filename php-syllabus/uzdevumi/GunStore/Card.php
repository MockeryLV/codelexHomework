<?php

class Card{

    private int $balance;
    private int $pin;

    public function __construct(int $balance, int $pin)
    {
        $this->balance = $balance;
        $this->pin = $pin;
    }

    public function withdrowal(int $amount): void{

        $this->balance -= $amount;

    }

    /**
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * @return int
     */
    public function getPin(): int
    {
        return $this->pin;
    }
}