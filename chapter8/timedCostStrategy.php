<?php
class TimedCostStrategy extends Coststrategy {

    public function cost(Lesson $lesson): int {

        return ($lesson->getDuration() * 5);
    }

    public function chargeType(): string {

        return "rate per hour";
    }
}
?>