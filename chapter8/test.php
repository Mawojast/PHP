<?php
spl_autoload_register();

$lessonA = new Seminar(3, new TimedCostStrategy);
$lessonB = new Seminar(4, new FixedCostStrategy);

$mgr = new RegistrationMgr();

$mgr->register($lessonA);
?>