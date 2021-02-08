<?php

require __DIR__ . "/vendor/autoload.php";

$report = "";

for ($timestables = 1; $timestables <= 15; $timestables += 1) {
    for ($i = 1; $i <= 15; $i++) {
        $entry = $timestables * $i;
        $report .= "{$entry}\t";
    }
    $report .= "\n";
}

echo $report;
