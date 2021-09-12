<?php

require_once 'Product.php';
require_once 'Loader.php';
require_once 'Store.php';
require_once 'UserInterface.php';

$file = 'db.csv';

$loader = new Loader($file);

$store = new Store($loader->getProducts());

$userInterface = new UserInterface($loader, $store);


while(true){
    system('clear');
    $userInterface->mainMenu();
}

