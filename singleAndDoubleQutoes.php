<?php
// Differences between single and double quotes in php

/**
 * Escape Sequences
 */

echo "Hello everybody! \nHope you are fine!";
// Output: Hello everybody! 
//         Hope you're fine!

echo 'Hello everybody! \nHope you are fine!';
// Output: Hello everybody! \nHope you are fine!

/**
 * Variables within a string
 */

$name = "Mahtab";

echo "Hello $name! Hope you are fine!";
// Output: Hello Mahtab! Hope you are fine!

echo 'Hello $name! Hope you are fine!';
// Output: Hello $name! Hope you are fine!
