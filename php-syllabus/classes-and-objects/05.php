<?php


class Date{

    private int $month;

    private int $day;

    private int $year;


    public function __construct(int $day, int $month, int $year)
    {
        $this->month = $month;
        $this->day = $day;
        $this->year = $year;
    }

    public function __get(int $name)
    {
        if(property_exists($this, $name)){
            return $this->$name;
        }
    }

    public function __set(int $name, int $value)
    {
        if(property_exists($this, $name)){
            $this->$name = $value;
        }
    }

    public function DisplayDate(): string {
        if($this->month >= 10){
            return "$this->month/$this->day/$this->year";
        }
        return "0$this->month/$this->day/$this->year";
    }
}


$birthday = new Date(24,9,2001);


echo $birthday->DisplayDate() . PHP_EOL;
