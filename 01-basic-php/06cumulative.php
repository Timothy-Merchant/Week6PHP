<?php

require __DIR__ . "/vendor/autoload.php";

for ($i = 1; $i <= 50; $i += 1) {
    $total = $total + $i;
    dump($total);
}