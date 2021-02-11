<?php

declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

class LightSwitch
{
    private $state = false;

    public function isOn(): bool
    {
        return $this->state;
    }

    public function turnOn(): void
    {
        $this->state = true;
    }

    public function turnOff(): void
    {
        $this->state = false;
    }
}

$lightSwitch = new LightSwitch();

// you can check whether it is on or not
dump($lightSwitch->isOn()); // false

// you can turn it on
$lightSwitch->turnOn();
dump($lightSwitch->isOn()); // true

// you can turn it off
$lightSwitch->turnOff();
dump($lightSwitch->isOn()); // false