<?php

require_once 'Gun.php';
require_once 'User.php';
require_once 'Pistol.php';
require_once 'Rifle.php';
require_once 'GunStore.php';
require_once 'UserInterface.php';

$user = new User(1000, ['Rifle', 'Pistol']);

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
    readline('Press ENTER to continue!');
}
