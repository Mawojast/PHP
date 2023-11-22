<?php
class MathStaticExample {

    public const PI = 3.14;
    public static $lastCalculation = null;

}

class Circle extends MathStaticExample{

    public static function getCircumferenceByDiameter(int|float $diameter): int|float{

        $radius = $diameter / 2;
        $circumference = 2 * parent::PI * $radius;

        parent::$lastCalculation = "Method: ".__FUNCTION__.". Result: ".$circumference."\n";
        return $circumference;
    }

}
echo MathStaticExample::$lastCalculation;
echo Circle::getCircumferenceByDiameter(69999999999);
echo Circle::$lastCalculation;
echo MathStaticExample::$lastCalculation;