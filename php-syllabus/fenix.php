<?php


/*
 * ir likme (10,20,40,80)
 *            1  2  3  4
 */

system('clear');

$grid = [
    ['-', '-' ,'-'],
    ['-', '-' ,'-'],
    ['-', '-' ,'-']
];


$bid = 0;

$balance = 1000;

function printGrid($grid, $balance){
    system('clear');
    foreach ($grid as $item){
        foreach ($item as $i){
            echo "$i ";
        }
        echo PHP_EOL;
    }
    echo PHP_EOL. "Balance: $balance$" . PHP_EOL . PHP_EOL;
}

function spinning($grid, $symbols, $balance){

    foreach ($grid as $key => $item){
        foreach ($item as $k => $i){
            // 't' regulates speed of spinning
            for($t = 0; $t < 5; $t++){
                $grid[$key][$k] = $symbols[rand(0, count($symbols) - 1)];
                printGrid($grid, $balance);
            }
        }
    }
    return $grid;
}



$symbols = ['A', 'B', 'B' ,'C', 'C', 'C', 'D' ,'D', 'E', 'E', 'D', 'D','D', 'E'];

// 'E' got nothing

$listOfBids = [10,20,40,80];




echo 'Welcome to FENIX!' .  PHP_EOL;
echo 'Balance: ' . $balance . '$';
while(true){

    $winning = 0;
    $winsOnGrid = 0;
    $mplier = 1;


    echo PHP_EOL;
    foreach ($listOfBids as $key => $bids){
        echo "$key: $bids$". PHP_EOL;
    }
    echo PHP_EOL . "Type 'exit' to quit!" . PHP_EOL;

    echo PHP_EOL;
    $bid = (string) readline('Choose the bid: ');
    if ($bid === 'exit'){
        exit;
    }
    $bid =  (int)$bid;
    if(!array_key_exists($bid, $listOfBids)){
        echo 'Wrong input!' . PHP_EOL;
        continue;
    }else if($listOfBids[$bid] > $balance){
        echo 'You do not have enough cash!' . PHP_EOL;
        continue;
    }

    $balance = $balance - $listOfBids[$bid];
    $grid = spinning($grid, $symbols, $balance);

    foreach($grid as $key => $item){
        if(in_array($grid[$key][0], $symbols) && $grid[$key][0] === $grid[$key][1] && $grid[$key][1] === $grid[$key][2]){
            $winsOnGrid++;
            switch($grid[$key][0]){
                case 'A':
                    $mplier=5;
//                    readline('test');
                    break;
                case 'B':
                    $mplier=2;
//                    readline('test');
                    break;
                case 'C':
                    $mplier=1.5;
//                    readline('test');
                    break;
                case 'D':
                    $mplier=1;
                    break;
                default:
                    $mplier = 0;
                    break;
            }
        }
        foreach ($item as $k => $i){
           if($key === 0 &&$grid[$key][$k] === $grid[$key+1][$k] && $grid[$key + 1][$k] === $grid[$key+2][$k]){
               $winsOnGrid++;
               switch($grid[$key][$k]){
                   case 'A':
                       $mplier=5;
//                       readline('test');
                       break;
                   case 'B':
                       $mplier=2;
//                       readline('test');
                       break;
                   case 'C':
                       $mplier=1.5;
//                       readline('test');
                       break;
                   case 'D':
                       $mplier=1;
                       break;
                   default:
                       $mplier = 0;
                       break;
               }
           }

        }

    }

    foreach($listOfBids as $bids){
        if($winsOnGrid === 6 && $grid[0][0] === 'A'){
            readline('JackPOT!');
            $winning+= ($bids / 10) * 5;
            $winning = pow($winning, $winsOnGrid) * $mplier;
        }
        if($listOfBids[$bid] === $bids && $winsOnGrid > 0){
            $winning+= ($bids / 10) * 5;
//            readline("$winning and $winsOnGrid and $mplier");
            $winning = pow($winning, $winsOnGrid) * $mplier;
        }
    }

    echo PHP_EOL . "Earned: +$winning$" . PHP_EOL;

    $balance+=$winning;

}





