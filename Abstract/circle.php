<?php
namespace Math\Circle;
require_once(dirname(__FILe__)."/geometry.php");

use Math\Geometry;
final class Circle extends Geometry{

    private const PI = 3.14;
    private int|float $radius = 0.00;

    public function __construct(string $unit, int|float $radius){

        parent::__construct($unit);
        $this->radius = $radius;
    }

    public function calculateArea(): int|float{

        return self::PI * pow($this->radius, 2);
    }

    public function calculateCircumference(): int|float{

        return 2 * self::PI * $this->radius;
    }
}

$circle = New Circle('meter', 32);
var_dump($circle->calculateArea());