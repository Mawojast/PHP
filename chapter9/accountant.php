<?php
class Accountant extends Employee {

    public function fire(): void {

        echo "{$this->name}: Bye.";
    }
}
?>