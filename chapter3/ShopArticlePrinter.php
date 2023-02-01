<?php
require_once(__DIR__."/class.ShopArticle.php");

class ShopArticlePrinter {

    private $articles = [];

    public function addArticle(ShopProduct $shopProduct): void {

        $this->articles[] = $article;
    }

    public function print(): void {

        $str = "";
        foreach ($this->articles as $shopArticle) {
            $str .= "{$shopArticle->title}: ";
            $str .= $shopArticle->getProducerName();
            $str .= " ({$shopArticle->getPrice()})\n";
        }

        echo $str;
    }
}
?>