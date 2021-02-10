<?php

namespace App\Stuff\Things;

class Potato
{
    private $wateredCount = 0;

    public function water()
    {
        $this->wateredCount += 1;
    }

    public function hasGrown()
    {
        return $this->wateredCount >= 5;
    }
}
