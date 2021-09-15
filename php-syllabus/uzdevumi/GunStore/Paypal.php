<?php

class Paypal{

    private int $balance;
    private string $email;
    private string $pwd;

    public function __construct(int $balance, string $email, string $pwd)
    {
        $this->balance = $balance;

        $this->email = $email;
        $this->pwd = $pwd;
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
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPwd(): string
    {
        return $this->pwd;
    }

}