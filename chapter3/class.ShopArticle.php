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
        public float $price = 0.00){
    }

    public function getProducerName(): string{
        return $this->firstName . " " . $this->lastName;
    }

}
?>