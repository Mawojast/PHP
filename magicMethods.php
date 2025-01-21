<?php


class MagicMethods{

    private int $number = 3;

    /**
     * The __construct method is triggered when an object of a class is created.
     */
    public function __construct(){

        echo "__construct:\nObject was created\n";
    }

    /**
     * The __call method is called when methods that do not exist are used.
     * Param $name -> called method name.
     * Param $arguments -> used arguments.
     */
    public function __call(string $name, mixed $arguments): void{
        
        $description = "__call:\nMethod \"$name\" does not exsist.\n";

        if($arguments){

            $argumentNumber = 0;
            foreach($arguments as $value){
                $argumentNumber++;
                $description .= "$argumentNumber. Argument: $value\n";
            }
        }

        echo $description."\n";
    }

    /**
     * The __set method is called when you try to assign a value to a property that doesn't exist or is out of scope
     * Param $name -> called property name.
     * Param $value -> assigned value.
     */
    public function __set($name, $value): void{

        $description = "__set:\n";

        if(property_exists($this, $name)){
            $description .= "Class property \"$name\" is out of scope.\n";
        }else{
            $description .= "Class property \"$name\" does not exists.\n";
        }

        if($value){
            $description .= "Assigned Value: $value";
        }

        echo $description."\n";
    }

    /**
     * The __get method is called when you try to access to a property that doesn't exist or is out of scope
     * Param $name -> called property name.
     */
    public function __get($name): void{

        $description = "__get:\n";

        if(property_exists($this, $name)){
            $description .= "Class property \"$name\" is out of scope.\n";
        }else{
            $description .= "Class property \"$name\" does not exists.\n";
        }

        echo $description."\n";
    }

    /**
     * The __toString() method is called when you treat a class object as a string
     */
    public function __toString(): string{
        
        return "__toString:\nThis object is not of type string but you can treat it as string.\n";
    }

    /**
     * The __invoke() method is called when you treat a class object as a function
     * Param $sumNumber -> optional Parameter
     */
    public function __invoke($sumNumber = 0): int{
        
        return 43 + $sumNumber;
    }
}


// __construct
$MagicMethods = new MagicMethods();
// Output: Object was created

// __call
$MagicMethods->callWrongMethod('someArgument', [1,2,3], NULL);
// Output: Method "callWrongMethod" does not exsist.
//         1. Argument: someArgument
//         2. Argument: Array
//         3. Argument:

// __set
$MagicMethods->inaccessibleProperty = "Some Value";
//Output: Class property "inaccessibleProperty" does not exists.
//        Value: Some Value
$MagicMethods->number = 5;
// Output: Class property "number" is out of scope.
//         Value: 5

// __get
$MagicMethods->inaccessibleProperty;
//Output: Class property "inaccessibleProperty" does not exists.
$MagicMethods->number;
// Output: Class property "number" is out of scope.

// __toString
echo $MagicMethods;
// Output: This object is not of type string but you can treat it as string.

// __invoke
$MagicMethods();
// Output: 43
$MagicMethods(5);
// Output: 48


?>