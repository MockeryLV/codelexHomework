<style>
    body{
        font-family: "Arial";
        text-transform: capitalize;
    }
    table {
        width: 100%;
        margin-bottom: 20px;
        border: 1px solid #dddddd;
        border-collapse: collapse;
    }
    table th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }
    table td {
        border: 1px solid #dddddd;
        padding: 5px;
    }
</style>

<?php


require_once 'vendor/autoload.php';

use App\Classes\Loader as Loader;
use App\Classes\TableSetter as TableSetter;
use App\Classes\UserInterface as UserInterface;


$file = 'db.csv';

$loader = new Loader($file);

$tblSet = new TableSetter($loader->getFields());


$ui = new UserInterface($loader, $tblSet);


$ui->printTable();


