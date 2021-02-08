<?php

// REGULAR EXPRESSIONS (REGEX)

// A way to check/search a string for a pattern as opposed to a specific string.

// Quantifiers:

// * 0 or more
// + 1 or more
// ? 0 or 1
// {3} exactly 3
// {3,} 3 or more
// {3,5} 3, 4, or 5

// /a+/ - would match 'a', 'aa', 'aaa', 'aaaa', etc.
// /b*/ - would match '', 'b', 'bb', 'bbb', etc.
// /c?/ - would match '' and 'c'
// /d{3}/ - would match 'ddd'
// /d{3,5}/ - would match 'ddd', 'dddd', and 'ddddd'
// /abc*/ - would match 'ab', 'abc', 'abcc', 'abccc', etc.
// /(abc)*/ - would match '', 'abc', 'abcabc', 'abcabcabc', etc.
// /https?:/ - would match 'http:' and 'https:'

// Character Set Description:

// [abc] ’a’, ’b’, or ’c’
// [^abc] not ’a’, ’b’, or ’c’
// [a-z] all lowercase letters
// [A-Z] all uppercase letters
// [0-9] all numbers
// [0-9afg] all numbers plus ’a’, ’f’, and ’g’
// [a-zA-Z] all letters, case-insensitive
// [a-zA-Z0-9] alphanumeric characters
// [0-9A-F] valid hexadecimal digits

// Special Characters:

// \n a new line
// \r a carriage return
// \t a tab

// Character Classes:

// \s whitespace (spaces, tabs, etc.)
// \S not whitespace
// \w word ([A-Za-z0-9_])
// \W not word
// \d digit
// \D not digit

// Dot:

// In a regex the . character has a special meaning: any character except for \n. You
// need to be careful using it, particularly with the * and + quantifiers.
// /.+@.+/ - '@' symbol with something either side
// If you want to match an actual full stop you need to “escape” it with a backslash:
// /\.+@\.+/ - an '@' symbol with some number of '.' either side

// Anchors:

// ^ beginning of the string
// $ end of the string

// /^abc/ - would match 'abc' but not '0abc'
// /abc$/ - would match 'abc' but not 'abc0'

// Examples:

// /[a-z]+/ - any number of lowercase letters
// /[a-z0-9_-]/ - a single lowercase letter, digit, underscore, or hyphen
// /^[a-z0-9_-]{3,16}$/ - Match any combination of lowercase letters, numbers, underscores, and hyphens between 3 and 16 characters
// /,\s*/ - a comma followed by 0 or more whitespace characters
// /\w\s+\w/ - two words separated by 1 or more whitespace characters


// REGEX AND PHP

// preg_match

// Returns 1 if a match is found and 0 if it is not.

// does the string contain one or more 'l' characters
preg_match("/l+/", "Hello"); // 1
// does the string *start* with one or more 'l' characters
preg_match("/^l+/", "Hello"); // 0
// does the string contain two words, separated by a space
preg_match("/\w\s+\w/", "Hello There World"); // 1
// does the string consist of *just* two words, separated by a space
preg_match("/^\w\s+\w$/", "Hello There World"); // 0
preg_match("/^\w\s+\w$/", "Hello Mum"); // 1

if (preg_match("/l+/", "Hello") === 1) {
    // matches one or more 'l' characters
}

// preg_split

// preg_split can be used to split a string on a certain regex:
// Returns an array

$csv = "first, second,   third,fourth";
// split on a comma followed by 0 or more spaces
$result = preg_split("/,\s*/", $csv);
// [
// [0] => "first",
// [1] => "second",
// [2] => "third",
// [3] => "fourth"
// ]


// preg_replace

// used to replace part of a string that matches a
// regex with something else:

$str = 'blah     blah   blah';
// replace one or more space with a single space
$tidied = preg_replace("/\s+/", " ", $str);
// "blah blah blah"


// Flags

// i 
// case insensitive 
// pattern will match upper and lower case

// m 
// multi-line 
// separate lines count as separate strings for anchors

// s 
// dot all 
// the . character should include new lines

// These go after the last forward-slash, 
// e.g. "/[a-z]*/i".


// ALTERNATIVES TO REGEX

// The filter_var function takes a string and a filter type. 
// It then returns the filtered string if it is valid or false otherwise.

$email = "penny@hello.horse";
$valid = filter_var($email, FILTER_VALIDATE_EMAIL);
if ($valid) {
// valid email address
}

// There are lots of filters, see docs. eg:
// • FILTER_VALIDATE_EMAIL
// • FILTER_VALIDATE_DOMAIN
// • FILTER_VALIDATE_URL