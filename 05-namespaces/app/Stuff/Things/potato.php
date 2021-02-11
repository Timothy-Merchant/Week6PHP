<?php

declare(strict_types=1);

namespace App\Stuff\Things;

class Potato
{
    private $wateredCount = 0;

    public function water(): void
    {
        $this->wateredCount += 1;
    }

    public function hasGrown(): bool
    {
        return $this->wateredCount >= 5;
    }
}
