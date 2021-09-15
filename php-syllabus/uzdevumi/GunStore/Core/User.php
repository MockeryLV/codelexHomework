<?php


class User {

    private Wallet $wallet;


    private array $licenses = [];


    public function __construct(Wallet $wallet, array $licenses)
    {
        $this->licenses = $licenses;
        $this->wallet = $wallet;
    }

    public function getLicenses(): array
    {
        return $this->licenses;
    }

    /**
     * @return int
     */
    /**
     * @return Wallet
     */
    public function getWallet(): Wallet
    {
        return $this->wallet;
    }

    /**
     * @param int $cash
     */

}