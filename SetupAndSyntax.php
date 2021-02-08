<?php

/* 
 *    SETUP, COMPOSER & SYMFONY
*/

// load in the Composer configuration
// __DIR__ just means the directory this file is in
require __DIR__ . "/vendor/autoload.php";

// php file.php
// ^ run PHP in the command line

echo 'hello, world!';
var_dump('hello world!');
var_dump(12);
var_dump([1, 2]);
// echo is a KEYWORD, not a function or method    

// COMPOSER REPL
// composer global require psy/psysh    
// COMPOSER is a REPL (Read, Evaluate, Print, Loop)
// type psysh to begin the repl

// SYMFONY FRAMEWORK (a set of reusable PHP components)
// composer require symfony/var-dumper
// Allows us to get console.log style behaviour (MUST INSTALL EACH PROJECT)
// Creates:
// composer.json (keeps track of installed packages)
// composer.lock (keeps track of package versions)
// .gitignore the vendor directory it creates, but not the above two.

// .gitignore file:
// vendor/

// Add Laravel's support package to access collections:
// composer require illuminate/support
// OR:
// composer create-project --prefer-dist laravel/laravel collection-box


// This gives access to: (a console.log equivalent)
dump('hello world');

// Dump and die function:
dd();



// =====================

// VARIABLES

$age = 4;
$houseNumber = 21;
$name = "Archie";
$name = "Ben";
// ^will change value of $name
$notUseful = $age + $houseNumber;

// SCALAR types, numbers, strings, booleans, represent a SINGLE VALUE

dump(12 + 12); // 24
dump(0.1 + 0.2); // 0.3 - hurrah! unlike JS's 0.30000000000000004


// MATH FUNCTIONS

// rounding
floor(12.3030); // 12
ceil(12.3030); // 13
round(12.3030); // 12
// powers/roots
pow(2, 3); // 8
sqrt(16); // 4
// random
mt_rand(5, 10); // random integer between 5 and 10 (inclusive)

// Never trust floating point numbers!
floor((0.1 + 0.7) * 10); // 7 - oop!

// Double quotes allow interpolation - don't confuse with JS interpolation ${} where dollar is outside
$fullName = "{$firstName} {$lastName}";
// Single quotes don't...
$lastName = 'Spoooky';

// CONCATENATION

dump($firstName . $lastName); // "CasperSpooky"
dump($firstName + $lastName); // PHP Warning - A non-numeric value encountered
dump("1" + "2"); // 3 - coerces to numbers

// STRING FUNCTIONS
strtolower("Blah"); // "blah"
strtoupper("Blah"); // "BLAH"
trim(" Blah "); // "Blah"
substr("Fishsticks", 4); // "sticks"

// LOOPS

// do-while loop example
$i = 0;
$total = 0;

do {
    $i += 1;
    $total += $i;
} while ($total < 100);

dump($total); // 105

// FUNCTIONS

// All variables declared inside a function are locally scoped by default
// $x = 10;
function wtf($z)
{
    $x = 20; // different $x, locally scoped
    return $x + $z;
}

$result = wtf(12);

dump($result); // 32
dump($x); // 10

// No function expressions in PHP, but can be achieved using closures:
$add = function ($a, $b) {
    return $a + $b;
};

$result = $add(1, 2);
dump($result); // 3

// Functions don't have access to variables outside themselves
// In order to use these you need to use the 'USE' keyword:

$multiplyBy = 10;

$result = array_map(function ($value) use ($multiplyBy) {
    return $value * $multiplyBy;
}, [1, 2, 3]);

dump($result); // [10, 20, 30]

// The above, but with PHP 7.4+ arrow functions
// this avoids the need for use as it uses the parent scope
$multiplyBy = 10;
// You only get read access to this parent variable, so you can't change it inside the closure.

$result = array_map(fn ($value) => $value * $multiplyBy, [1, 2, 3]);

dump($result); // [10, 20, 30]

// ARRAYS (Numerically Indexed)

// Arrays are either numerically indexed or associative in PHP
// Arrays are NOT Objects in PHP (unlike Javascript), so no Array.from etc.

$values = [1, 2, 3, 4, 5];

$first = $values[0]; // first item in array
$last = $values[4]; // last item in this array

dump($first); // 1
dump($last); // 5

// Add a value to the end of an array:
$values[] = 6;
// Find out how many values in the array:
count($values); // 5

// Wordpress discourages this syntax and prefers the old deprecated style:
$values = array(1, 2, 3, 4, 5);

// ARRAYS (Associative)

//Associative arrays are effectively PHP’s version of object literals: in PHP “objects” are (almost) always instances of a class, but the key-value pairing of object literals is still a useful concept:

$assoc = [
    "firstName" => "Ben",
    "lastName" => "Wales",
    "dob" => "2018-08-24",
];

dump($assoc["lastName"]); // "Wales"

//Notice that the syntax is quite different from JS: square brackets to open, keys need quoting, and fat-arrow between the key and value.

$arr = [];
$arr["key"] = 1; // key provided
$arr[] = 2; // no key, so starts at 0
dump($arr); // ["key" => 1, 0 => 2]S

// Automatically provides numerical array key if none provided.


// ARRAY ITERATOR METHODS

// Foreach

foreach ($values as $value) {
    // $value will be each value in turn
}

$assoc = [
    "firstName" => "Ben",
    "lastName" => "Wales",
    "dob" => "2018-08-24",
];
foreach ($assoc as $key => $value) {
    // $key will be each key in turn
    // $value will be each value in turn
}

$values = [1, 2, 3, 4, 5];
foreach ($values as $index => $value) {
    // $index will be each index in turn
    // $value will be each value in turn
}

// FILTER

// use the collect function to create a new collection
$numbers = collect([1, 2, 3, 4, 5]);
$even = $numbers->filter(fn ($n) => $n % 2 === 0);
dump($even->all()); // [2, 4]
// all() turns a collection back into a standard array

// MAP

$numbers = collect([1, 2, 3, 4, 5]);
$squared = $numbers->map(fn ($n) => $n * $n);
dump($squared->all()); // [1, 4, 9, 16, 25]

// REDUCE

$numbers = collect([1, 2, 3, 4, 5]);
// remember, reduce takes two arguments
// the accumulator and each value in turn
// the initial value for $acc is null
// so make sure you set it
$sum = $numbers->reduce(fn ($acc, $val) => $acc + $val, 0);
dump($sum); // 15

// PLUCK

$goodWatchin = collect([
    ["id" => 1, "name" => "Unbreakable Kimmy Schmidt"],
    ["id" => 2, "name" => "The Leftovers"],
    ["id" => 3, "name" => "Game of Thrones"],
]);
// [1, 2, 3]
dump($goodWatchin->pluck("id")->all());
// ["Unbreakable Kimmy Schmidt", "The Leftovers", "Game of Thrones"]
dump($goodWatchin->pluck("name")->all());

// The collect function is actually creating an instance of the Collection class, which wraps the array, and you’re calling various methods on it. When you call the all() method it gives you back the array it’s been working on.