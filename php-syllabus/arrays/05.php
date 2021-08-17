<?php




$grid = [['_', '_', '_'],['_', '_', '_'],['_', '_', '_']];

$turn = 1;


function getGrid($grid){
    system('clear');
    echo '  0|1|2' .PHP_EOL;
    foreach ($grid as $key => $field){
        echo $key . '|';
        foreach ($field as $item){
            echo $item . '|';
        }
        echo PHP_EOL;
    }

    echo PHP_EOL;
}

function getTurn($turn) :string{
    if($turn % 2 === 0){
        return 'O';
    }
    return 'X';
}

function checkState($grid, $turn){

    //wins by diagonals
    if($grid[1][1] !== '_' && $grid[1][1] === $grid[0][0] && $grid[0][0] === $grid[2][2]){
        getGrid($grid);
        echo getTurn($turn) . ' won!' . PHP_EOL;
        exit;
    }else if($grid[1][1] !== '_' && $grid[1][1] === $grid[0][2] && $grid[1][1] === $grid[2][0]){
        getGrid($grid);
        echo getTurn($turn) . ' won!' . PHP_EOL;
        exit;
    }


    foreach ($grid as $key => $field) {
        //Win by horizontal line
        if ($field[0] !== '_' && $field[0] === $field[1] && $field[1] === $field[2]) {
            getGrid($grid);
            echo getTurn($turn) . ' won!' . PHP_EOL;
            exit;

        }

        //Win by vertical line
        foreach ($field as $index =>$item){
            if(
                $grid[$key][$index] !== '_' &&
                @$grid[$key][$index] === @$grid[$key + 1][$index] &&
                @$grid[$key][$index] === @$grid[$key + 2][$index]
            ){
                getGrid($grid);
                echo getTurn($turn) . ' won!' . PHP_EOL;
                exit;
            }
        }

    }
}


function isTie($grid){
    foreach ($grid as $item){
        if(in_array('_',$item)){
            return false;
        }
    }
    return true;
}

while(true){


    while(true){
        getGrid($grid);
        $xy = readline(getTurn($turn) . ', choose your location (row, column):');
        if(
            (strlen($xy) === 2 || (strlen($xy) === 3 && $xy[1] === ' ')) &&
            $xy[0] >= 0 &&
            $xy[0] <=2 &&
            $xy[1] >= 0 &&
            $xy[1] <=2
        ){
            break;
        }

        readline('Incorrect input. Press Enter to try again!');
    }

    if(strlen($xy) === 3){
        $x = explode(' ', $xy)[1];
        $y = explode(' ', $xy)[0];
    }else{
        $x = str_split($xy)[1];
        $y = str_split( $xy)[0];
    }


    if($grid[$y][$x] === '_'){
        $grid[$y][$x] = getTurn($turn);

        if(isTie($grid)){
            getGrid($grid);
            echo 'The game is tie!' . PHP_EOL;
            exit;
        }
        checkState($grid, $turn);

        $turn++;
    }else{
        readline('The place is already taken. Press Enter to change coorditates!');
    }

}