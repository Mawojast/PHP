<?php
class TroopCarrier extends CompositeUnit {
    public function addUnit(Unit $unit): void {

        if ($unit instanceof Cavalry) {
            throw new UnitException("Can't get a horse on the vehicle");
        }
        parent::addUnit($unit);
    }
        
    public function bombardStrenght(): int {

        return 0;
    }
}
?>