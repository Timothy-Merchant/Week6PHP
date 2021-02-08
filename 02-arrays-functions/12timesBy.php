<?php

require __DIR__ . "/vendor/autoload.php";

// Foreach method
// function timesBy($values, $multiplier)
// {
//     $result = [];
//     foreach ($values as $value) {
//         $result[] = $value * $multiplier;
//     }
//     return $result;
// }

// Collection method
function timesBy($values, $multiplier)
{
    $numbers = collect($values);
    $result = $numbers->map(fn ($value) => $value * $multiplier)->all();
    return $result;
}

dump(
    timesBy([2, 3, 4, 5, 6], 10), // [20, 30, 40, 50, 60]
    timesBy([2, 3, 4], 5), // [10, 15, 20]
    timesBy([2, 3, 4, 5, 6, 7], -5), // [-10, -15, -20, -25, -30, -35]
    timesBy([-3, -4, -5, -6], -5), // [15, 20, 25, 30]
);
