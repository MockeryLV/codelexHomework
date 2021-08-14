<?php


$integers =  [3,6,7,856,31,9];

foreach ($integers as $integer){
    if($integer % 3 === 0){
        echo $integer . "\n";
    }
}