<?php

class Card extends PaymentMethod {

    private int $pin;

    public function __construct(int $balance, int $pin)
    {

        $this->pin = $pin;
        parent::__construct($balance);
    }

    public function getPin(): int
    {
        return $this->pin;
    }
}