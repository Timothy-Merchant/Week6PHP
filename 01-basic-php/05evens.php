<?php

require __DIR__ . "/vendor/autoload.php";

for ($i = 1; $i < 50; $i += 1) {
    $i % 2 === 0 && $i % 3 === 0 ? dump($i) : null;
}
