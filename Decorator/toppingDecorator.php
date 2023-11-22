<?php
namespace Offer\Food;
use Offer\Food;

abstract class ToppingDecorator implements Food {
    protected $food;

    public function __construct(Food $food) {
        $this->food = $food;
    }

    public function getDescription(): string {
        return $this->food->getDescription();
    }

    public function getCost(): float {
        return $this->food->getCost();
    }
}