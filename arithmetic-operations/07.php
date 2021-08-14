<?php


function GravityF(float $t, int $vi, int $xi): float{
    $a = -9.81; // Free fall acceleration
    return 0.5 * ($a * ($t*$t)) + ($vi * $t) + $xi;
}


echo GravityF(10, 0,0);