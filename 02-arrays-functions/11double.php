<?php

require __DIR__ . "/vendor/autoload.php";

// Foreach method
// function double($values)
// {
//     $result = [];
//     foreach ($values as $value) {
//         $result[] = $value * 2;
//     }
//     return $result;
// }

// Collect method
function double($values)
{
    $numbers = collect($values);
    return $result = $numbers->map(fn ($value) => $value * 2)->all();
}

dump(
    double([2, 3, 4, 5, 6]), // [4, 6, 8, 10, 12]
    double([1, 2, 5]), // [2, 4, 10]
);
