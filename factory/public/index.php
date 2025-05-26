<?php

require_once __DIR__ . '/../app/Factory/VehicleFactory.php';

$vehicle = VehicleFactory::create('car');
echo $vehicle->deliver() . "<br>";

$smart = VehicleFactory::createFromConditions(5, 10);
echo $smart->deliver() . "<br>";

$heavy = VehicleFactory::createFromConditions(10, 300);
echo $heavy->deliver();
