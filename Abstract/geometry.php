<?php
namespace Math;
abstract class Geometry{

    public function __construct(protected string $unit){}

    abstract public function calculateArea(): int|float;

    abstract public function calculateCircumference(): int|float;
}


?>