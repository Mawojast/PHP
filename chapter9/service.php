<?php
class Service extends Employee {

    public function fire(): void  {

        echo "Service employee {$this->name}: Bye.";
    }
}
?>