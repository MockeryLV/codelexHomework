<?php


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;


class EnergySurvey{

    public static function calculate_energy_drinkers(int $numberSurveyed, float $purchased_energy_drinks)
    {
        return round($numberSurveyed * $purchased_energy_drinks, 0);

    }

    public static function calculate_prefer_citrus(int $numberSurveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks)
    {
        return round((EnergySurvey::calculate_energy_drinkers($numberSurveyed, $purchased_energy_drinks) * $prefer_citrus_drinks), 0);
    }
}



echo "Total number of people surveyed " . $surveyed . PHP_EOL;
echo "Approximately " . EnergySurvey::calculate_energy_drinkers($surveyed, $purchased_energy_drinks)
    . " bought at least one energy drink"
    . PHP_EOL;
echo EnergySurvey::calculate_prefer_citrus($surveyed, $purchased_energy_drinks,$prefer_citrus_drinks)
    . " of those "
    . "prefer citrus flavored energy drinks."
    . PHP_EOL;