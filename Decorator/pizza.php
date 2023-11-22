<?php
namespace Offer\Food; 
use Offer\Food;
class Pizza implements Food{

    public function getDescription(): string{

        return "Pizza mit Tomatensoße und Käse";
    }

    public function getCost(): float {

        return 7.50;
    }
}

$costs = [
    'Margherita' => [
        'small' => [
            'cost' => 6.00,
            'topping' =>[
                'cheese' => 1.00,
                'Pepperoni' => 1.00,
                'Onion' => 0.50
            ] 
        ], 
        'large' => [
            'cost' => 7.50,
            'topping' =>[
                'cheese' => 1.50,
                'Pepperoni' => 1.50,
                'Onion' => 1.00
            ],
        ]
    ],
    'BasicSalad' => [
        'small' => [
            'cost' => 5.50,
            'topping' =>[
                'cheese' => 0.70,
                'Pepperoni' => 1.00,
                'Onion' => 0.50
            ] 
        ], 
        'large' => [
            'cost' => 8.00,
            'topping' =>[
                'cheese' => 1.00,
                'Pepperoni' => 1.50,
                'Onion' => 0.70
            ] 
        ]
    ],
    'Spaghetti' => [
        'cost' => 9.00
    ]
];