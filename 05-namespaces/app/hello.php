<?php

declare(strict_types=1);

namespace App;

class Hello
{
    public function hello(string $name): string
    {
        return "Hello {$name}";
    }
}
