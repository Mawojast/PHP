<?php
class Person {

    private int $id;

    public function __construct( protected string $name, private int $age) {}

    public function setId( int $id ): void {

        $this->id = $id;
    }

    public function __destruct() {

        if ( !empty($this->id) ) {
            echo $this->id;
        }
    }
}
?>