<?php
namespace Offer\Food;
use Offer\Food\ToppingDecorator;
use Offer\Food\Pizza;

class Topping extends ToppingDecorator {
    public function getDescription(): string {
        return $this->food->getDescription() . ", Pepperoni";
    }

    public function getCost(): float {
        return $this->food->getCost() + 2.00;
    }
}