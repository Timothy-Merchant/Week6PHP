<?php

require __DIR__ . "/vendor/autoload.php";

// foreach method
// function sumBoth($array1, $array2)
// {
//     $both = array_merge($array1, $array2);    
//     $result = 0;

//     foreach ($both as $value) {
//         $result += $value;
//     }    

//     return $result;
// }

// Collect method
function sumBoth($array1, $array2)
{
    $both = collect(array_merge($array1, $array2));
    return $result = $both->reduce(fn ($acc, $value) => $acc += $value);
}

dump(
    sumBoth([2, 3, 4, 5, 6], [1, 2, 3, 4]), // 30
    sumBoth([2, 3, 4, 5, 6], [5, 10, 12]), // 47
);
