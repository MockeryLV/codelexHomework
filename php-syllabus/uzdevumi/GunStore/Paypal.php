<?php

class Paypal extends  PaymentMethod {

    private string $email;
    private string $pwd;

    public function __construct(int $balance, string $email, string $pwd)
    {
        parent::__construct($balance);

        $this->email = $email;
        $this->pwd = $pwd;
    }

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