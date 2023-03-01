<?php
abstract class Lesson {

    public const FIXED = 1;
    public const TIMED = 2;

    public function __construct(protected int $duration, private Coststrategy $coststrategy) {}

    public function cost(): int {
        return $this->coststrategy->cost($this);
    }

    public function chargeType(): string {
        return $this->coststrategy->chargeType();
    }

    public function getDuration(): int {
        return $this->duration;
    }
}
?>