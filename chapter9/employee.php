<?php 
abstract class Employee {

    private static $types = ['Cleaner', 'Accountant', 'Service'];

    
    public function __construct(protected string $name){}

public static function recruit(string $name): Employee {

        $num = rand(1, count(self::$types)) - 1;
        $class = __NAMESPACE__."\\".self::$types[$num];

        return new $class($name);
    }
    abstract public function fire(): void;
}
?>