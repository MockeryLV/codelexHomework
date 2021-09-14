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
          'date' => $this->date,
          'country' => $this->country,
          'twoWeek' => $this->twoWeek,
          'travelStatus' => $this->travelStatus,
          'selfIsolationPeriod' => $this->selfIsolationPeriod
        ];
    }

}