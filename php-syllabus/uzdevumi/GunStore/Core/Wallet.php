<?php

class Wallet{

    private Cash $cash;
    private Card $card;
    private Paypal $paypal;

    public function __construct(Cash $cash, Card $card, Paypal $paypal)
    {

        $this->cash = $cash;
        $this->card = $card;
        $this->paypal = $paypal;
    }

    public function getCash(): Cash
    {
        return $this->cash;
    }

    public function getCard(): Card
    {
        return $this->card;
    }

    public function getPaypal(): Paypal
    {
        return $this->paypal;
    }

}