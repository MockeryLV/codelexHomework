<?php


Class Geometry{


    public static function CircleArea(float $r): float{
        system('clear');
        return round(pi() * ($r * $r), 2);
    }
    public static function RectangleArea(float $length, float $width): float{
        return $length * $width;
    }
    public static function TriangleArea(float $base, float $height): float{
        return $base * $height * 0.5;
    }
}

///Calculate the Area of a Rectangle
//Calculate the Area of a Triangle
//Quit

while(true){
    system('clear');
    echo "Geometry calculator" . PHP_EOL . PHP_EOL;

    echo "Calculate the Area of a Circle". PHP_EOL;
    echo "Calculate the Area of a Rectangle". PHP_EOL;
    echo "Calculate the Area of a Triangle". PHP_EOL;
    echo "Quit" .PHP_EOL;

    $choice = (int) readline('Enter your choice (1-4):');
    echo PHP_EOL;

    if($choice === 0){
        readline('Invalid input. Press Enter to try again!');
    }

    switch($choice){
        case 1:
            system('clear');
            $r = readline('Please enter the circle radius (m^2):');
            echo PHP_EOL . 'Circle area is ' .Geometry::CircleArea($r) .'(m^2)' . PHP_EOL;
            return false;
            break;
        case 2:
            system('clear');
            $l = readline('Please enter the rectangle length (m):');
            $w = readline('Please enter the rectangle width (m):');
            echo PHP_EOL . 'Rectangle area is ' .Geometry::RectangleArea($l, $w) .'(m^2)' . PHP_EOL;
            return false;
            break;
        case 3:
            system('clear');
            $b = readline('Please enter the triangle base (m):');
            $h = readline('Please enter the triangle height (m):');
            echo PHP_EOL . 'Triangle area is ' .Geometry::TriangleArea($b, $h) .'(m^2)' . PHP_EOL;
            return false;
            break;
        case 4:
            exit;
    }
}



