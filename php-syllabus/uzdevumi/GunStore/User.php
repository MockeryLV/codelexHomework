<?php


class User {

    private int $cash;

    private array $licenses = [];


    public function __construct(int $cash, array $licenses)
    {
        $this->cash = $cash;
        $this->licenses = $licenses;
    }

    public function getLicenses(): array
    {
        return $this->licenses;
    }

    /**
     * @return int
     */
    public function getCash(): int
    {
        return $this->cash;
    }

    /**
     * @param int $cash
     */
    public function setCash(int $cash): void
    {
        $this->cash-= $cash;
    }
}