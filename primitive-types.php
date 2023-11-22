<?php
// boolean

echo "\nis_bool(true)\n";
var_dump(is_bool(true));
//true

echo "\nis_bool(false)\n";
var_dump(is_bool(false));
//true

echo "\nis_bool(1)\n";
var_dump(is_bool(1));
//false

echo "\nis_bool(0)\n";
var_dump(is_bool(0));
//false

echo "\nis_bool(1>2)\n";
var_dump(is_bool(1>2));
//true

echo "--------------------";
// integer

echo "\nis_integer(0)\n";
var_dump(is_integer(0));
//true

echo "\nis_integer(-33)\n";
var_dump(is_integer(-33));
//true

echo "\nis_integer(786342879634786874352876435)\n";
var_dump(is_integer(786342879634786874352876435));
//false
?>