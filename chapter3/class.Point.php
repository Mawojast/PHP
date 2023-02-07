<?php
class Point {

    private $x = 0;
    private $y = 0;

    public function setValues(int $x, int $y) {

        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): int {

        return $this->x;
    }

    public function getY(): int {

        return $this->y;
    }
}
?>