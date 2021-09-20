<?php

require_once 'vendor/autoload.php';

use Carbon\Carbon;

use League\Csv\Reader;
use League\Csv\Statement;

$csv = Reader::createFromPath('db.csv', 'r');
$csv->setDelimiter(';');
$csv->setHeaderOffset(0); //set the CSV header offset

//get 25 records starting from the 11th row
$stmt = Statement::create()
    ->offset(0)
    ->limit(10);

$records = $stmt->process($csv);
foreach ($records as $record) {
    foreach ($record as $item){
        echo $item . ' ';
    }
    echo '<br>';
}
