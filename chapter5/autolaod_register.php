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
$namespaces = function (string $path) {
    if (preg_match('/\\\\/', $path)) {
        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
    }
    if (\stream_resolve_include_path("{$path}.php") !== false) {
        require_once("{$path}.php");
    }
};
spl_autoload_register($basic);
spl_autoload_register($undescoredDirectoryClass);
spl_autoload_register($namespaces);
?>