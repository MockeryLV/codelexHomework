<?php

class Cash extends PaymentMethod {


    public function __construct(int $balance)
    {
        parent::__construct($balance);
    }


}