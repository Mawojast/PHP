<?php
namespace Offer;

interface Food {
    
    protected function getDescription(): string;

    protected function getCost(): float;
}