<?php
spl_autoload_register();
$w = new Water();
$w->wave();

$uw = new Util_Water();
$uw->wave();
$cd = new CdArticle('title', 'firstname', 'lastname', '9.99', '55');
$prodclass = new ReflectionClass(CdArticle::class);
$methods = $prodclass->getMethods();
$method = $prodclass->getMethod("setId");
print_r($method->getParameters() );
//echo ReflectionUtil::getMethodSource($method);
//var_dump(get_class_methods($prodclass));
//echo ClassInfo::getData($prodclass);
//echo ReflectionUtil::getClassSource($prodclass);
$classname = CdArticle::class;

$rmethod1 = new ReflectionMethod("{$classname}::__construct");
$rmethod2 = new ReflectionMethod($classname, "__construct");
$rmethod3 = new ReflectionMethod($cd, "__construct");
//echo $rmethod3;
