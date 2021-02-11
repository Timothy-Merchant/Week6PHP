<?php

declare(strict_types=1);

namespace App\Cooking;

class Ingredient
{
    private $name;
    private $dietryInfo;

    public function __construct($name, $dietryInfo)
    {
        $this->name = $name;
        $this->dietryInfo = collect($dietryInfo);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function vegan(): bool
    {
        return !$this->dietryInfo->contains("animal produce");
    }
}
