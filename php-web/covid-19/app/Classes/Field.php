<?php

namespace App\Classes;

class Field{

    private string $date;
    private string $country;
    private float $twoWeek;
    private string $travelStatus;
    private string $selfIsolationPeriod;
    private string $persVac;
    private string $persTestB;
    private string $persTestA;
    private string $persIsoLat;
    private string $citTestB;
    private string $citTestA;



    public function __construct(string $date, string $country, string $twoWeek,
                                string $travelStatus, string $selfIsolationPeriod,
                                string $persVac, string $persTestB, string $persTestA,
                                string $persIsoLat, string $citTestB, string $citTestA
)
    {
        $this->date = $date;
        $this->country = $country;
        $this->twoWeek = (float)$twoWeek;
        $this->travelStatus = $travelStatus;
        $this->selfIsolationPeriod = $selfIsolationPeriod;
        $this->persVac = $persVac;
        $this->persTestB = $persTestB;
        $this->persTestA = $persTestA;
        $this->persIsoLat = $persIsoLat;
        $this->citTestB = $citTestB;
        $this->citTestA = $citTestA;
    }

    public function getInfo(): array{
        return [
          'date' => strlen($this->date) > 20? substr($this->date, 0, 20) .  '...': $this->date,
          'country' => strlen($this->country) > 20? substr($this->country, 0, 20) .  '...': $this->country,
          'twoWeek' => strlen($this->twoWeek) > 20? substr($this->twoWeek, 0, 20) .  '...': $this->twoWeek,
          'travelStatus' => strlen($this->travelStatus) > 10? substr($this->travelStatus, 0, 10) .  '...': $this->travelStatus,
          'selfIsolationPeriod' => strlen($this->selfIsolationPeriod) > 15? substr($this->selfIsolationPeriod, 0, 15) .  '...': $this->selfIsolationPeriod,
            'persVac' => strlen($this->persVac) > 10? substr($this->persVac, 0, 10) .  '...': $this->persVac,
            'persTestB' => strlen($this->persTestB) > 10? substr($this->persTestB, 0, 10) .  '...': $this->persTestB,
            'persTestA' => strlen($this->persTestA) > 10? substr($this->persTestA, 0, 10) .  '...': $this->persTestA,
            'persIsoLat' => strlen($this->persIsoLat) > 10? substr($this->persIsoLat, 0, 10) .  '...': $this->persIsoLat,
            'citTestB' => strlen($this->citTestB) > 10? substr($this->citTestB, 0, 10) .  '...': $this->citTestB,
            'citTestA' => strlen($this->citTestA) > 10? substr($this->citTestA, 0, 10) .  '...': $this->citTestA,
        ];
    }

}