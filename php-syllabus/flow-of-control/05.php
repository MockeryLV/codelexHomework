<?php


$PhoneKeyPad = [

    2 => ['a', 'b', 'c'],
    3 =>['d', 'e', 'f'],
    4 =>['g', 'h', 'i'],
    5 =>['j', 'k', 'l'],
    6 =>['m', 'n', 'o'],
    7 =>['p', 'q', 'r', 's'],
    8 =>['t', 'u', 'v'],
    9 =>['w', 'x', 'y', 'z'],

];


$string = 'hello';

$stringArr = str_split($string);



foreach ($stringArr as $key1 => $letter){

    foreach ($PhoneKeyPad as $key2 => $item){

        if(in_array($letter ,$PhoneKeyPad[$key2])){
            $times = 1+array_search( $letter, $PhoneKeyPad["$key2"]);
            echo str_repeat($key2, $times);
        }

    }
    echo'-';
}
