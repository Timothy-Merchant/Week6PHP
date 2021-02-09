<?php

require __DIR__ . "/vendor/autoload.php";

function validEmail($email)
{
    $trimmedEmail = preg_replace("/(^\s+)|(\s+$)/", "", $email);    
    return filter_var($trimmedEmail, FILTER_VALIDATE_EMAIL) === $trimmedEmail;
}

dump(validEmail(" blahf   ")); // false
dump(validEmail(" blah@f")); // false
dump(validEmail("blah@ fish.horse")); // false
dump(validEmail(" blah@fish.horse")); // true
dump(validEmail("blah@fish.horse ")); // true
dump(validEmail(" blah@fish.horse ")); // true