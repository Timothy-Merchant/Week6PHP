<?php

require __DIR__ . "/vendor/autoload.php";

function both($array1, $array2)
{
    $result = [];
    foreach ($array1 as $value1) {
        foreach ($array2 as $value2) {
            if ($value1 === $value2) {
                $result[] = $value2;
            }
        }
    }
    return $result;
}

dump(
    both([2, 3, 4, 5, 6], [1, 2, 5, 6]), // [2, 5, 6]
);
