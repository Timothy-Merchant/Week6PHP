<?php

require __DIR__ . "/vendor/autoload.php";

// Foreach version
// function total($items)
// {
//     $total = 0;
//     foreach ($items as $item) {
//         $total += $item["price"];
//     }
//     return $total;
// };

// Collect version
function total($items)
{
    $shoppingBasket = collect($items);
    return $result = $shoppingBasket->reduce(fn ($total, $item) => $total += $item["price"], 0);
}


$shoppingList = [[
    "name" => "coffee",
    "price" => 3.50,
], [
    "name" => "tea",
    "price" => 2.50,
], [
    "name" => "toblerone",
    "price" => 3.20,
], [
    "name" => "newspaper",
    "price" => 0.10,
]];

dump(
    total($shoppingList), // 9.3
);
