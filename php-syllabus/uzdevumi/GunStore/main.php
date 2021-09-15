<?php

require_once 'Gun.php';
require_once 'User.php';
require_once 'Pistol.php';
require_once 'Rifle.php';
require_once 'Card.php';
require_once 'Cash.php';
require_once 'Wallet.php';
require_once 'Paypal.php';
require_once 'GunStore.php';
require_once 'UserInterface.php';


$cash = new Cash(200);
$card = new Card(997, 228888);
$paypal = new Paypal(321, 'smh@gmail.com', '123');

$wallet = new Wallet($cash, $card, $paypal);

$user = new User($wallet, ['Rifle', 'Pistol']);

$guns = [
    new Pistol('Glock', 100),
    new Pistol('Diegle', 200),
    new Rifle('Ak-47', 300)
];


$gunStore = new GunStore($guns);

$ui = new UserInterface($gunStore, $user);

while(true){
    system('clear');
    $ui->mainMenu();
    $ui->openGun($ui->selectGun());


    readline('Press ENTER to continue!');
}
