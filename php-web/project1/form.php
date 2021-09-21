<?php

require_once 'vendor/autoload.php';

use Spatie\CalendarLinks\Link;


$title = $_POST['title'];
$dsc = $_POST['description'];
$address = $_POST['address'];
$dateFrom = str_replace('T',' ' ,$_POST['date-from']);
$dateDue = str_replace('T',' ' ,$_POST['date-due']);



$from = DateTime::createFromFormat('Y-m-d H:i', $dateFrom);
$to = DateTime::createFromFormat('Y-m-d H:i', $dateDue);


$link = Link::create($title, $from, $to)
    ->description($dsc)
    ->address($address);

// Generate a link to create an event on Google calendar
echo "<a href='{$link->google()}' target='_blank'>Your link!</a>";