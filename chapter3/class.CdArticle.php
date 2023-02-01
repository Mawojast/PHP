<?php
require_once(__DIR__."/class.ShopArticle.php");
class CdArticle extends ShopArticle{

    public function __construct (
        string $title,
        string $firstName,
        string $lastName,
        float|int $price,
        private int $playLength
    ) {
        parent::__construct($title, $firstname, $lastname, $price);

        $this->getPlayLength = $playLength;
    }

    public function getPlayLength(): int {

        return $this->playLength;
    }

    public function getInfo(): string {

        $info = parent::getInfo();
        $info .= ": Time - {$this->playLength}";

        return $info;
    }
}

?>