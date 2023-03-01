<?php
class FixedCostStrategy extends Coststrategy {

    public function cost(Lesson $lesson): int {

        return 30;
    }

    public function chargeType(): string {

        return "fixed rate";
    }
}
?>