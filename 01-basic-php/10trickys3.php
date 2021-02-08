<?php

require __DIR__ . "/vendor/autoload.php";

$report = "";

for ($timestable = 1; $timestable <= 15; $timestable += 1) {
    for ($i = 1; $i <= 15; $i += 1) {
        $entry = $timestable * $i;
        $report .= "{$entry}\t";
    }

    $report .= "\n";
}

echo $report;
