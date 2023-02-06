<?php
include(__DIR__."/abstract.Service.php");
class UtilityService extends Service {

    private int taxrate = 20;

    public function calculateTax(float $price): float {

        return (($this->taxrate / 100) * $price);
    }
}
?>