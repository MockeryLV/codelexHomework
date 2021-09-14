<?php

require_once 'Field.php';
require_once 'Loader.php';
require_once 'ConsoleTable.php';
require_once 'TableSetter.php';
require_once 'UserInterface.php';

$file = 'db.csv';

$loader = new Loader($file);

$tbl = new ConsoleTable();

$tblSet = new TableSetter($tbl, $loader->getFields());




$ui = new UserInterface($loader, $tblSet);
system('clear');
while(true){


    $ui->options();


}