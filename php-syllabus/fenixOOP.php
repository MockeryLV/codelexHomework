<?php

class SlotMachineLogic{

    public $balance;

    public $validBets = [
        1 => 10,
        2 => 20,
        3 => 40,
        4 => 80
    ];

    public $bet;

    public $rows;

    public $columns;

    public $board = [];

    public $symbolsKoef = [
        10 => 'A',
        7 => 'B',
        5 => 'C',
        3 => 'D',
    ];

    public $symbols = [
        'A', 'B', 'B', 'C', 'C', 'C', 'D', 'D', 'D', 'D'
    ];

    public function __construct(int $rows, int $columns, int $balance = 1000)
    {
        $this->rows = $rows;
        $this->columns =  $columns;
        $this->balance = $balance;

    }

    public function Spin(int $bet){

        $this->bet = $bet;

        $this->balance-= $this->validBets[$bet];

        for($r = 0; $r < $this->rows; $r++){
            for($c = 0; $c < $this->columns; $c++){
                for($t = 0; $t < 5; $t++){
                    $this->board[$r][$c] = $this->symbols[array_rand($this->symbols)];
                    $this->printBoard();
                }
                usleep(50000);
            }
        }
    }

    public function printBoard(): void{
        system('clear');
        foreach ($this->board as $rows){
            foreach ($rows as $item){
                echo $item . ' ';
            }
            echo PHP_EOL;
        }

    }
     

    private function isWinningRow($row): bool{
        if(count(array_unique($row)) === 1){
            return true;
        }
        return false;
    }

    public function checkState(){
        foreach($this->board as $row){
            if($this->isWinningRow($row)){
                $symbolKey = array_search($row[0][0], $this->symbolsKoef);
                $this->countWinning($this->bet, $symbolKey);
            }
        }
    }

    private function countWinning(int $bet, int $symbolKey): void{
        $this->balance+= ($bet * 5) * $symbolKey;
    }
}

$fenix = new SlotMachineLogic(3,4);

system('clear');

//echo 'Welcome To Fenix!' . PHP_EOL . PHP_EOL;
//sleep(1);

while(true){

    echo "Balance: $fenix->balance$" . PHP_EOL;
    echo 'List of bets: ' . PHP_EOL ;

    foreach ($fenix->validBets as $key => $value){
        echo "$key: $value". PHP_EOL;
    }

    while(true){
        $bet = (int) readline('Choose your bet (ENTER for 10$): ');
        if($bet === 0){
            $bet = 1;
        }
        if(!isset($fenix->validBets[$bet])){
            echo 'Invalid input, try again!' . PHP_EOL;
        }else{
            break;
        }
    }

    system('clear');

    echo "Balance: $fenix->balance$" . PHP_EOL . PHP_EOL;
    $oldBalance = $fenix->balance;
    $fenix->Spin($bet);
    $fenix->checkState();
    $earned = $fenix->balance - $oldBalance;
    echo PHP_EOL . "Earned: " . $earned . '$' . PHP_EOL;


}

//
//$fenix->setBoard(1);
//echo $fenix->balance . '$' . PHP_EOL;
//$fenix->printBoard();
//
//$fenix->checkState();
//
//echo $fenix->balance . '$' . PHP_EOL;