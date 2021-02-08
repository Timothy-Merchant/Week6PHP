<?php

require __DIR__ . "/vendor/autoload.php";

function average5($first, $second, $third, $fourth, $fifth)
{
    return ($first + $second + $third + $fourth + $fifth) / 5;
}

dump(average5(1, 2, 3, 4, 5)); // 3