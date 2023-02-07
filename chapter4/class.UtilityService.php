<?php
class UtilityService extends Service {

    use PriceUtilities {
        PriceUtilities::calculateTax as private;
    }
    /*
    use TaxTools {
        TaxTools::calculateTax insteadOf PriceUtilities;
        PriceUtilities::calculateTax as PriceUtiltiesCalculateTax;
    }
    */

    public function __construct( private float $price ) {}

    public function getTaxRate(): float {

        return 20;
    }

    public function getFinalPrice(): float {

        return ($this->price + $this->calculateTax( $this->price ));
    }
}
?>