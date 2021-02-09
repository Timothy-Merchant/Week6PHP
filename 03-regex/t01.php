<?php

require __DIR__ . "/vendor/autoload.php";

function validEmail($email)
{
    $trimmedEmail = preg_replace("/(^\s+)|(\s+$)/", "", $email);
    dump($trimmedEmail);
    return preg_match('/[a-z0-9_-]+\@[a-z0-9_-]+\.[a-z0-9_-]+/i', $trimmedEmail) === 1;
}

dump(validEmail(" blahf   ")); // false
dump(validEmail(" blah@f")); // false
dump(validEmail("blah@ fish.horse")); // false
dump(validEmail(" blah@fish.horse")); // true
dump(validEmail("blah@fish.horse ")); // true
dump(validEmail(" blah@fish.horse ")); // true