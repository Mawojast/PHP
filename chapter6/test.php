<?php
spl_autoload_register();
$test = XmlParamHandler::getInstance(__DIR__."/params.xml");
$test->addParam("key1", "val1");
$test->addParam("key2", "val2");
$test->addParam("key3", "val3");
$test->write();
var_dump($test);
?>