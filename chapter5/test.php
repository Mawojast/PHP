<?php
$basePath = __DIR__;
$classname = "task";
$classPath = "{$basePath}/tasks/{$classname}.php";
if ( !file_exists($classPath) ) {
    throw new Exception("ClassPath not found: {$classPath}\n");
} 
require_once($classPath);

$pathWithClassname = "tasks\\$classname";
if ( !class_exists($pathWithClassname) ) {
    throw new Exception("No path found: {$pathWithClassname}\n");
}
$Task = new $pathWithClassname();
$Task->doSpeak();

require_once(__DIR__."/article.php");
use articles\Article;

$article = new Article();
$article->getClass();
var_dump($article);