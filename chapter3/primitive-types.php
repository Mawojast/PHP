<?php
// boolean
echo "is_bool():\n";

echo "\nis_bool(true)\n";
var_dump(is_bool(true));

echo "\nis_bool(false)\n";
var_dump(is_bool(false));

echo "\nis_bool(1)\n";
var_dump(is_bool(1));

echo "\nis_bool(0)\n";
var_dump(is_bool(0));

echo "\nis_bool(1>2)\n";
var_dump(is_bool(1>2));

echo "--------------------";
// integer
echo "\nis_integer():\n";

echo "\nis_integer(0)\n";
var_dump(is_integer(0));

echo "\nis_integer(-33)\n";
var_dump(is_integer(-33));

echo "\nis_integer(786342879634786874352876435)\n";
var_dump(is_integer(786342879634786874352876435));
?>