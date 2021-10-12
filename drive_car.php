<?php

include "vendor/autoload.php";

$bus = new Driver\Bus(5);
$bus->start();
echo PHP_EOL;
$bus->addPassenger(10);
echo PHP_EOL;
$bus->up(100);
echo PHP_EOL;
$bus->stop();




$car = new Driver\Car(5);
$car->start();

$car->up(100);
echo PHP_EOL;
//$car->turn('somewhere');
echo PHP_EOL;
$car->turn('left');
echo PHP_EOL;
$car->down(40);
echo PHP_EOL;
$car->stop();


