<?php


$weight = 114;

$height = 65;



function BMImeter(float $weight, float $height): string{
    $BMI = round((($weight * 703) / ($height * $height)), 0);

    if($BMI >= 18.5 && $BMI <= 25 ){
        return "Your BMI ($BMI) is considered optimal!";
    }
    if($BMI < 18.5){
        return "Your BMI ($BMI) is considered underweight!";
    }
    return "Your BMI ($BMI) is considered overweight!";
}

echo BMImeter($weight, $height);

