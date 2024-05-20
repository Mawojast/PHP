<?php
require_once("queue.php");
require_once("logger.php");
require_once("stringHelper.php");
class Counter {

    // With the keyword use you include a trait in a class
    use StringHelper;

    // Both Queue an String Helper have the same method name length;
    // If you use the methode length, it automatically trigger the length method of Queue by using the keyword instead of;
    // You can trigger method length of StringHelper with the name stringLength by using the keyword as;
    use Queue{
        Queue::length insteadof StringHelper;
        StringHelper::length as stringLength;
    }

    // Traits providing abstract methods. Trait Logger has a abstract method called log()
    use Logger{
        // Changes access level of method getMessage() from public to private
        Logger::getMessage as private;
    }

    // Defines abstract method from trait Logger
    public function log(string $message):bool{

        return error_log($message, 0);
    }
}

// Using static function from trait StringHelper included in class Counter
var_dump(Counter::count_words("d d a bed a", "A", false));