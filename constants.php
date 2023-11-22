<?php

// Constant names are allways case-sensitive
define("APP_NAME", "Web1");
var_dump(APP_NAME); //Output Web1 

define("app_NAME", "Web2");
var_dump(app_NAME); //Output Web2

define("COOKIE_OPTIONS", [
    "path" => "/",
    "secure" => true,
    "httponly" => true,
    "expire" => 3600
]);
print_r(COOKIE_OPTIONS);
/*Output: Array
(
    [path] => /
    [secure] => 1
    [httponly] => 1
    [expire] => 3600
)*/

//Creating constant with const is not possible in inside block scopes.
const APP_name = "Web3";
var_dump(APP_name);

$options = "COOKIE_OPTIONS";
$cookie_options = constant($options);
var_dump($cookie_options);
/*Output: array(4) {
  ["path"]=>
  string(1) "/"
  ["secure"]=>
  bool(true)
  ["httponly"]=>
  bool(true)
  ["expire"]=>
  int(3600)
}*/

class Constants{

    public const VERSION = 1.7;

}
var_dump(Constants::VERSION);
?>