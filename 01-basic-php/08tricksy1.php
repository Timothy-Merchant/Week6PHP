<?php

require __DIR__ . "/vendor/autoload.php";

$lineCount = 0;
$total = 0;

for ($i = 1; $lineCount <= 50; $i += 1) {

    if ($i % 2 !== 0) {
        $total = $total + $i;
        dump($total);
        $lineCount += 1;
    }
}
