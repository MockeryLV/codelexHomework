<?php


class Field{

    private string $date;
    private string $country;
    private float $twoWeek;
    private string $travelStatus;
    private string $selfIsolationPeriod;

    public function __construct(string $date, string $country, string $twoWeek, string $travelStatus, string $selfIsolationPeriod)
    {
        $this->date = $date;
        $this->country = $country;
        $this->twoWeek = (float)$twoWeek;
        $this->travelStatus = $travelStatus;
        $this->selfIsolationPeriod = $selfIsolationPeriod;
    }

    public function getInfo(): array{
        return [
          'date' => strlen($this->date) > 30? substr($this->date, 0, 30) .  '...': $this->date,
          'country' => strlen($this->country) > 30? substr($this->country, 0, 30) .  '...': $this->country,
          'twoWeek' => strlen($this->twoWeek) > 30? substr($this->twoWeek, 0, 30) .  '...': $this->twoWeek,
          'travelStatus' => strlen($this->travelStatus) > 30? substr($this->travelStatus, 0, 30) .  '...': $this->travelStatus,
          'selfIsolationPeriod' => strlen($this->selfIsolationPeriod) > 30? substr($this->selfIsolationPeriod, 0, 30) .  '...': $this->selfIsolationPeriod
        ];
    }

}