<?php
spl_autoload_register();
$boss = new Boss();
$boss->addEmployee(Employee::recruit('Jul'));
$boss->addEmployee(new Cleaner('Pete'));
$boss->addEmployee(new Accountant('Mike'));
$boss->projectFails();
?>