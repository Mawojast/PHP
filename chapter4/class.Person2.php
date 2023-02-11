<?php
class Person2 {

    public function output( PersonPrinter $printer ): void {

        $printer->write($this);
    }

    public function getName(): string {
        
        return "Jul";
    }

    public function getAge(): int {

        return 43;
    }
}