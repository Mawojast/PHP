<?php
class Person1 {

    private ?string $name;
    private ?string $age;

    public function __construct( private PersonPrinter $printer ) {}

    public function __call( string $method, array $args ) {

        if ( method_exists($this->printer, $method) ) {
            return $this->printer->$method($this);
        }
    }

    public function __get( string $property ): mixed {

        $method = "get{$property}";

        if( method_exists($this, $method )) {
            return $this->$method();
        }

        return false;
    }

    public function __set( string $property, mixed $value): void {

        $method = "set{$property}";
        if ( method_exists($this, $method)) {
            $this->$method($value);
        }
    }

    public function __isset( string $property ) {

        $method = "get{$property}";
        return (method_exists($this, $method));
    }

    public function __unset( string $property ) {

        $method = "set{$property}";

        if ( method_exists($this, $method) ) {
            $this->$method(null);
        }
    }

    public function getName(): string {

        return 'Fawn';
    }

    public function getAge(): int {

        return 29;
    }

    public function setName( ?string $name ): void {

        $this->name = $name;

        if ( !is_null($name)) {
            $this->name = strtolower($this->name);
        }
    }

    public function setAge( ?int $age ): void {

        $this->age = $age;
    }
}
?>