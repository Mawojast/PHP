<?php
class ShopArticle {

    private int|float $discount = 0;

    public function __construct(
        private string $title, 
        private string $firstName = "", 
        private string $lastName = "", 
        protected int|float $price = 0.00
        ){}

    public function getFirstName() {

        return $this->firstName;
    }

    public function getLastName() {

        return $this->lastName;
    }

    public function getProducerName(): string{

        return $this->firstName . " " . $this->lastName;
    }

    public function getPlayLength(): int {

        return $this->playLength;
    }

    public function getPrice(): int|float {

        return ($this->price - $this->discount);
    }

    public function setDiscount(float|int $num): void {

        $this->discount = $num;
    }

    public function getNumberOfPages(): int {

        return $this->numPages;
    }

    public function getInfo(): string {

        $info = "{$this->title} - {$this->lastName}, ";
        $info .= "{$this->firstName}";

        return $info;
    }
}
?>