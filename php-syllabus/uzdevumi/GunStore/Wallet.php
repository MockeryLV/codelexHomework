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

    /**
     * @return Cash
     */
    public function getCash(): Cash
    {
        return $this->cash;
    }

    /**
     * @return Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * @return Paypal
     */
    public function getPaypal(): Paypal
    {
        return $this->paypal;
    }






}