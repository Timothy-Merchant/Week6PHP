<?php
declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

class Stringy
{
    private $userString;

    public function __construct(string $userString)
    {
        $this->userString = $userString;
    }

    public function lower(): string
    {
        return strtolower($this->userString);
    }

    public function upper(): string
    {
        return strtoupper($this->userString);
    }

    public function append(string $stringToAppend) : string
    {
        return $this->userString . $stringToAppend;
        // return implode("", [$this->userString, $stringToAppend]);
    }

    public function repeat(int $total) : string
    {
        return str_repeat($this->userString, $total);
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