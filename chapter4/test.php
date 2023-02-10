<?php
require_once(__DIR__."/require.php");

$a = new Account(345);
$p = new Person("Jul", 45, $a);
$p->setId(564);
var_dump($p);
$ac = clone $p;
$ac->setId(4556);
var_dump($ac);

?>



