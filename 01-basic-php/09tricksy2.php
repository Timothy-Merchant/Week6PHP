<?php

require __DIR__ . "/vendor/autoload.php";

$multiples = 0;
$cumulativeTotal = 0;

for ($i = 1; $multiples < 117; $i += 1) {

    if ($i % 3 === 0 || $i % 7 === 0) {
        $multiples += 1;
        $cumulativeTotal += $i;
    }
}

dump($cumulativeTotal);
