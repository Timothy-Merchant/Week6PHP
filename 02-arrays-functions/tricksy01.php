<?php

require __DIR__ . "/vendor/autoload.php";

function wow($oCount)
{
    $filler = "";

    for ($i = 0; $i < $oCount; $i++) {
        $filler .= "o";
    }

    return "W{$filler}w";
}

dump(wow(12)); // "Woooooooooooow"
dump(wow(4)); // "Woooow"