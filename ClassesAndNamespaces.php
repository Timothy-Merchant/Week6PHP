<?php

// Syntax for creating and using a class in PHP:

class Person
{
    // Declare properties at the top
    // Unassigned properties have value null.
    private $firstName;
    private $lastName;
    private $birthdate;

    public function __construct($firstName, $lastName, $birthdate)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
    }
    public function getAge()
    {
        $date = new DateTime($this->birthdate);
        $now = new DateTime();
        return $now->diff($date)->y;
    }
}

// create new Person object "instances"
// passing in the unique values when we create it
$mark = new Person("Mark", "Wales", "1984-04-16");
$ben = new Person("Ben", "Wales", "2018-08-24");
// we can call the getAge() method
$mark->getAge(); // 36
$ben->getAge(); // 1


// Set a default property:

class Person2
{
    // add an $arms property with the value of 2
    private $arms = 2;
    // ...rest of code
}


// Using GETTERS and SETTERS functions:

class Address
{
    private $street;
    private $town;
    private $postcode;
    private $country;

    // a setter function
    public function setStreet($street)
    {
        // $this represents whichever object we're working on
        $this->street = $street;
        return $this;
    }
    // ...setTown, setCountry, setPostcode as above
    // a getter function
    public function getFullAddress()
    {
        $parts = array_filter([
            $this->street,
            $this->town,
            $this->postcode,
            $this->country,
        ]);
        // you can call methods too
        return implode(", ", $parts);
    }
}

// IMPORTING & AUTOLOADING CLASSES FROM OTHER FILES

// Would work for importing a class once, but not ideal...
require_once __DIR__ . "/classes/App.php";
$app = new App(); // success!

// Another deprecated way:

// registers an autoloader
// if a class name is used that PHP doesn't recognise
// it will call this function and pass in the class name
spl_autoload_register(function ($class) {
    // the function loads in a file
    // using the class name that was passed in
    require_once __DIR__ . "classes/{$class}.php";
});

// NAMESPACES

// Assign a new namespace:

// Must be on the very first line of PHP file
namespace Blog\Data;
class Post { ... };

// When we want to use the class, we need to:
new Blog\Data\Post();

// Instead of typing this everytime, we can set things up like this:

// <?php
use Blog\Data\Post;
// further down the file
new Post(); // actually new Blog\Data\Post()
// we can use the other namespaced Post class
// we just need to use the full namespace
new Services\Slack\Post();

// Use an ALIAS for dealing with same class names in different namespaces:
use Blog\Data\Post;
use Services\Slack\Post as SlackPost;

new Post(); // actually new Blog\Data\Post()
new SlackPost(); // actually new Services\Slack\Post()

// Access the static class property to get a string
$class = Services\Slack\Post::class;
dump($class); // "Services\Slack\Post"
// otherwise you'd have to:
$class = "Services\\Slack\\Post"; // need to escape every backslash