<?php

require __DIR__ . "/vendor/autoload.php";

function threeOs($str)
{
    return preg_match('/[0o]{3,}/i', $str) === 1;
}

dump(threeOs("Hello")); // false
dump(threeOs("Helloo")); // false
dump(threeOs("Hellooo")); // true
dump(threeOs("HelloOoOo")); // true