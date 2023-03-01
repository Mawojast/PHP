<?php
abstract class Coststrategy {

    abstract public function cost(Lesson $lesson): int;
    abstract public function chargetype(): string;
}
?>