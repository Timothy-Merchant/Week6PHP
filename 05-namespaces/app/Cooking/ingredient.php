<?php

namespace App\Cooking;

class Ingredient
{
    private $name;
    private $dietryInfo;

    public function __construct($name, $dietryInfo)
    {
        $this->name = $name;
        $this->dietryInfo = $dietryInfo;
    }

    public function name()
    {
        return $this->name;
    }

    public function vegan()
    {
        $nonVeganArray = collect($this->dietryInfo)->filter(fn ($item) => preg_match('/animal produce/', $item) === 1)->all();
        return count($nonVeganArray) > 0 ? 'Not vegan friendly.' : 'Vegan friendly.';
    }
}
