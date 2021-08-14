<?php


$fruits = [

      'apple' => 0.5,

      'pineapple' => 4,

      'melon' => 11,

      'mango' => 244

      // Yes, I know melon is not a fruit :)

];

function isOverTen(string $fruit): bool {

    if($fruit > 10){

        return true;

    }else{

        return false;

    }

}


$shippingCosts = [
        ' costs 1$',
        ' costs 2$'
];

foreach ($fruits as $key => $value){

    if(isOverTen($value)){
        echo $key . "$shippingCosts[1]\n";
    }else{
        echo $key. "$shippingCosts[0] \n" ;
    }

}

