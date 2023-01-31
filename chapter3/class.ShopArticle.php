<?php
class ShopArticle {
    /*
    public $title = "default product";
    public $producerLastName = "last name";
    public $producerFirstName = "first name";
    public $price = 0;
    */
    public function __construct(
        public string $title, 
        public string $firstName = "", 
        public string $lastName = "", 
        public float $price = 0.00,
        public int $numOfPages = 0,
        public int $playLength = 0){
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

        $this->discount = $numL;
    }

    public function getNumberOfPages(): int {

        return $this->numPages;
    }

    public function getInfo(): string {

        $info = "{$this->title} - {$this->lastName}, ";
        $info .= "{$this->firstName}";

        if ( $this->type == 'book') {
            $info .= ": Count of pages: {$this->numPages}";
        } elseif ($this->type == 'cd') {
            $info .= ": time - {$this->playLength}";
        }

        return $info;
    }

}
?>