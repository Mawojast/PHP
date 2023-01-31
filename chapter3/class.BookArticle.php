<?php
class BookArticle extends ShopArticle {

    public function __construct (
        public string $title,
        public string $firstName,
        public string $lastName,
        public float $price,
        public int $numOfPages
    ) {}

    public function getNumberOfPages(): int {

        return $this->numOfPages;
    }

    public function getInfo(): string {

        $info = "{$this->title} - {$this->lastName}, {$this->firstName}";
        $info .= ": number of pages - {$this->numOfPages}";

        return $info;
    }

    public function getProducerName(): string {

        return $this->firstName." ".$this->lastName;
    }
}
?>