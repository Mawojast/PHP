<?php
require_once(__DIR__."/class.ShopArticle.php");
class CdArticle extends ShopArticle{

    public function __construct (
        public string $title,
        public string $firstName,
        public string $lastName,
        public float $price,
        public int $playLength
    ) {}

    public function getPlayLength(): int {

        return $this->playLength;
    }

    public function getInfo(): string {

        $info = "{$this->title} - {$this->lastName}, {$this->firstName}";
        $info .= ": Time - {$this->playLength}";

        return $info;
    }

    public function getProducerName(): string {

        return $this->firstName." ".$this->lastName;
    }
}

$article43 = new CdArticle("Monsana", "ket", "eto", 9.99, 0, 48.23);
var_dump($article43);
?>