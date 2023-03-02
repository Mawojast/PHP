<?php
class Cleaner extends Employee {

    public function fire(): void  {

        echo "Cleaner {$this->name}: Bye.";
    }
}
?>