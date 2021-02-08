<?php

require __DIR__ . "/vendor/autoload.php";

function squares($numbers)
{
    return $result = array_map(fn ($number) => pow($number, 2), $numbers);
}

dump(
    squares([2, 3, 4]), // [4, 9, 16]
    squares([2, 3, 4, 5, 6]), // [4, 9, 16, 25, 36]
);
