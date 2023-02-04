<?php
class StaticExample {

    public static int $aNum = 0;

    public static function sayHello(): void {
        echo "Hello";
    }
}

echo StaticExample::$aNum;
StaticExample::sayHello();
?>