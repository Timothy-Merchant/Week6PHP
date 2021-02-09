<?php

require __DIR__ . "/vendor/autoload.php";

class Stringy
{
    private $userString;

    public function __construct($userString)
    {
        $this->userString = $userString;
    }

    public function lower()
    {
        return strtolower($this->userString);
    }
    public function upper()
    {
        return strtoupper($this->userString);
    }
    public function append($stringToAppend)
    {
        return implode("", [$this->userString, $stringToAppend]);
    }
    public function repeat($numberToRepeat)
    {
        return str_repeat($this->userString, $numberToRepeat);
    }
}

$string = new Stringy("Na");

// it can lowercase a string
dump($string->lower()); // "na"

// it can uppercase a string
dump($string->upper()); // "NA"

// it can concatenate
dump($string->append("blah")); // "Nablah"

// it can repeat a string
dump($string->repeat(5)); // "NaNaNaNaNa"