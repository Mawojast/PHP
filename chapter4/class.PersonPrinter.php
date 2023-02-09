<?php
class PersonPrinter {

    public function printName( Person $person ): void {

        echo $person->getName();
    }

    public function printAge( Person $person ): void {

        echo $person->getAge();
    }
}
?>