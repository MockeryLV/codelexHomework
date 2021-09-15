<?php

class Cash{

    private int $balance;

    public function __construct(int $balance)
    {
        $this->balance = $balance;
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

}