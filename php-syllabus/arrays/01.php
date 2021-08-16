<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2165, 1457, 2456
];

echo "Original numeric array: ";

foreach ($numbers as $number){
    echo $number . PHP_EOL;
};

sort($numbers, SORT_REGULAR);


echo PHP_EOL . "Sorted numeric array: " . PHP_EOL;

foreach ($numbers as $number){
    echo $number . PHP_EOL;
}


$words = [
    "Java",
    "Python",
    "PHP",
    "C#",
    "C Programming",
    "C++"
];


echo PHP_EOL . "Original string array: " . PHP_EOL;

foreach ($words as $word){
    echo $word . PHP_EOL;
}

sort($words, SORT_REGULAR);

echo PHP_EOL ."Sorted string array: " . PHP_EOL;

foreach ($words as $word){
    echo $word . PHP_EOL;
}