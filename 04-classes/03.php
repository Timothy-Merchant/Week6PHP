<?php

require __DIR__ . "/vendor/autoload.php";

class Car
{
    private $make;
    private $numberPlate;
    private $mileage = 0;

    public function __construct(string $make, string $numberPlate)
    {
        $this->make = $make;
        $this->numberPlate = $numberPlate;
    }
    public function getNumberplate() : string
    {
        return $this->numberPlate;
    }
    public function getMake() : string
    {
        return $this->make;
    }
    public function getMileage() : int
    {
        return $this->mileage;
    }
    public function addJourney(int $distance)
    {
        $this->mileage += $distance;
    }
}

// you pass in a make and number plate
$car = new Car("Ford", "XY11 4TY");

// you can get various bits of information about it
dump($car->getNumberplate()); // "XY11 4TY"
dump($car->getMake()); // "Ford"
dump($car->getMileage()); // 0

// you can add journey
$car->addJourney(100);
dump($car->getMileage()); // 100

$car->addJourney(200);
dump($car->getMileage()); // 300