<?php

class BookArticle extends ShopArticle {

    public function __construct (
        string $title,
        string $firstName,
        string $lastName,
        float $price,
        private int $numOfPages
    ) {
        parent::__construct($title, $firstName, $lastName, $price);

        $this->numOfPages = $numOfPages;
    }

    public function getNumberOfPages(): int {

        return $this->numOfPages;
    }

    public function getInfo(): string {

        $info = parent::getInfo();
        $info .= ": number of pages - {$this->numOfPages}";

        return $info;
    }
}
?>