<?php

require __DIR__ . "/vendor/autoload.php";

function stone($weight)
{
    return round($weight / 6.35029318, 5);
}

dump(
    stone(74), // 11.65278
    stone(50), // 7.8735
);
