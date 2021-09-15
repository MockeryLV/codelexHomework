<?php
declare(strict_types = 1);

require_once 'Core/bootstrap.php';


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
}
