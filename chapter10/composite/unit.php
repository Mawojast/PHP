<?php 
abstract class Unit {

    abstract public function bombardStrenght(): int;
    public function addUnit(Unit $unit): void {

        throw new UnitException(get_class($this)."is a leaf");
    }

    public function removeUnit(Unit $unit): void {

        throw new UnitException(get_class($this). "is a leaf");
    }

    public function getComposite(): ?CompositeUnit {

        return;
    }
}
?>