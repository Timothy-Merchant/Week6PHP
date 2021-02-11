<?php

declare(strict_types=1);

namespace App\Shopping;

class BasketItem
{
    private $type;
    private $price;
    private $priceString;

    public function __construct(string $type, float $price)
    {
        $this->type = $type;
        $this->price = $price;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function priceFormatted(): string
    {
        return "£" . number_format($this->price, 2, '.', ',');
    }
}
