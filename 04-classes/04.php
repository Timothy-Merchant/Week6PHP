<?php

require __DIR__ . "/vendor/autoload.php";

class Address
{
    private $street;
    private $postCode;
    private $town;

    public function __construct(string $street, string $postCode, string $town)
    {
        $this->street = $street;
        $this->postCode = $postCode;
        $this->town = $town;
    }
    public function setStreet(string $street)
    {
        $this->street = $street;
    }
    public function setPostcode(string $postCode)
    {
        $this->postCode = $postCode;
    }
    public function setTown(string $town)
    {
        $this->town = $town;
    }
    public function fullAddress(): string
    {
        return implode(", ", [$this->street, $this->town, $this->postCode]);
    }
}

$address = new Address("1 Made Up Street", "BS4 8TR", "Bristol");

// logs the full address neatly
dump($address->fullAddress()); // "1 Made Up Street, Bristol, BS4 8TR"

// can update the street, postcode, and town
$address->setStreet("12 Cantelope Way");
$address->setPostcode("SW5 8RQ");
$address->setTown("Swansea");

// logs the new full address neatly
dump($address->fullAddress()); // "12 Cantelope Way, Swansea, SW5 8RQ"