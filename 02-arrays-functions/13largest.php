<?php

require __DIR__ . "/vendor/autoload.php";

// Foreach method
// function largest($values)
// {
//     $counter = $values[0];
//     foreach ($values as $value) {
//         $value > $counter ? $counter = $value : $counter;
//     }
//     return $counter;
// }

// Collect method
function largest($values)
{
    $numbers = collect($values);
    return $result = $numbers->reduce(fn ($acc, $value) => $value > $acc ? $acc = $value : $acc, $values[0]);
}

dump(
    largest([2, 4, 6, 4, 7, 5]), // 7
    largest([-2, 4, 6, 4, 2, -7, 5]), // 6
    largest([-2, -4, -4, -7, -5]), // -2
);
