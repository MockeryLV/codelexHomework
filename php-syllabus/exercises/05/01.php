<?php


function stringPlusCodelex(string $string) :string{
    return $string . ' codelex';
}

echo stringPlusCodelex('Hello Word!') . PHP_EOL;