<?php

require __DIR__ . "/vendor/autoload.php";

function hello($name)
{
    return "Hello, {$name}.";
};

dump(hello("alice")); // "hello alice"
dump(hello("bob")); // "hello bob"