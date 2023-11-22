<?php
namespace Offer\Food;
use Offer\Food;

class Salad implements Food{

    public function getDescription(): string{

        return "Salad";
    }

    public function getCost(): float {

        return 7.50;
    }
}