<?php
class Person {

    private int $id;

    public function __construct( protected string $name, private int $age, public Account $account ) {}

    public function setId( int $id ): void {

        $this->id = $id;
    }

    public function __clone(): void {

        $this->id = 0;
        $this->account = clone $this->account;
    }

    public function __destruct() {

        if ( !empty($this->id) ) {
            echo $this->id;
        }
    }
}
?>