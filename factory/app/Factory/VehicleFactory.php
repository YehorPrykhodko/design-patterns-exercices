<?php

require_once __DIR__ . '/../Entity/Bicycle.php';
require_once __DIR__ . '/../Entity/Car.php';
require_once __DIR__ . '/../Entity/Truck.php';

class VehicleFactory {
    public static function create(string $type): VehicleInterface {
        return match($type) {
            'bicycle' => new Bicycle(),
            'car'     => new Car(),
            'truck'   => new Truck(),
            default   => throw new InvalidArgumentException("Type inconnu: $type")
        };
    }

    public static function createFromConditions(float $distance, float $weight): VehicleInterface {
        if ($weight > 200) {
            return new Truck();
        }
        if ($weight > 20 || $distance > 20) {
            return new Car();
        }
        return new Bicycle();
    }
}
