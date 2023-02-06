<?php
class StaticExample2 {

    public static int $aNum = 0;

    public static function sayHello(): void {

        self::$aNum++;
        echo "Hello - ".self::$aNum."\n";
    }
}


//StaticExample2::sayHello();
?>