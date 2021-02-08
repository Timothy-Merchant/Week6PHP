<?php

require __DIR__ . "/vendor/autoload.php";

for ($i = 1; $i * 13 < 1000; $i += 1) {
    dump($i * 13);
}
