<?php
require_once(__DIR__."/class.ShopArticle.php");

class ShopArticlePrinter {

    public function print(ShopArticle $shopArticle) {

        $str = $shopArticle->title.": "
            .$shopArticle->getProducerName()
            ." (".$shopArticle->price.")\n";
        echo $str;
    }
}

$article1 = new ShopArticle("Mosona", "Johan", "Toast", 8.00);
$printer = new ShopArticlePrinter();
$printer->print($article1);
?>