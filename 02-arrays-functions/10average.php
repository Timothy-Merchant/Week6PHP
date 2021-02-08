<?php

require __DIR__ . "/vendor/autoload.php";

// Foreach method
// function average($values)
// {
//     $total = 0;

//     foreach ($values as $value) {
//         $total += $value;
//     }

//     return $total / count($values);
// }

// Collect method
function average($values)
{    
    $numbers = collect($values);
    $total = $numbers->reduce(fn ($acc, $val) => $acc + $val, 0);
    return $total / $numbers->count();
}

dump(
    average([2, 3, 4, 5, 6]), // 4
    average([2, 3]), // 2.5
    average([10, 30]), // 20
    average([-4, -8, -9]), // -7
);
