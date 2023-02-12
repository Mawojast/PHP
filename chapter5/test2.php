<?php

$basic = function( string $class ) {
    $classFile = __DIR__."/{$class}.php";

    if( file_exists($classFile) ){
        require_once($classFile);
    }
};
$undescoredDirectoryClass = function( string $class ) {
    $path = str_replace('_', DIRECTORY_SEPARATOR, $class);
    $path = __DIR__."/$path";

    if( file_exists("{$path}.php") ){
        require_once("{$path}.php");
    }
};
spl_autoload_register($basic);
spl_autoload_register($undescoredDirectoryClass);
$w = new Water();
$w->wave();

$uw = new Util_Water();
$uw->wave();
?>