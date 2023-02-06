<?php
include(__DIR__."/interface.Chargeable.php");
class Shipping implements Chargeable {

    public function __construct(private float $price){}

    public function getPrice(): float {

        return $this->price;
    }
}
?>