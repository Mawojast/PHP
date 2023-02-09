<?php
class Address {

    private string $number;
    private string $street;

    public function __construct( string $number, string $street = null ) {

        if ( is_null($street) ) {
            $this->streetaddress = $number;
        } else {
            $this->number = $number;
            $this->street = $street;
        }
    }

    public function __set( string $property, mixed $value ): void {

        if ( $property === "streetaddress" ) {
            if (preg_match("/^(\d+.*?)[\s,]+(.+)$/", $value, $matches)) {
                $this->number = $matches[1];
                $this->street = $matches[2];
            } else {
                throw new Exception("unable to parse street address: '{$value}'");
            }
        }
    }

    public function __get( string $property ): mixed {

        if ( $property === "streetaddress" ) {
            return $this->street . " " . $this->number;
        }

        return true;
    }
}
?>