<?php
abstract class ShopArticlePrinter {

    protected array $articles = [];

    public function addArticle(ShopArticle $shopArticle): void {

        $this->articles[] = $shopArticle;
    }

    abstract public function print(): void;
}
?>