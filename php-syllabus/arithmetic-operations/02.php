<?php


    function shutdown(){
        echo "\nbye!\n";
        exit;
    }

    register_shutdown_function("shutdown");

    pcntl_signal(SIGINT,"shutdown");



    system('clear');

    function CheckOddEven(int $number): string{
        if(is_int($number) &&$number % 2 === 0){
            return "Even Number!";
        }
        return "Odd Number!";
    }

    $number = readline('Enter any number:');

    echo CheckOddEven($number);


