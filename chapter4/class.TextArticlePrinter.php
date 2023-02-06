<?php
require_once(__DIR__."/abstract.ShopArticlePrinter.php");

class TextArticlePrinter extends ShopArticlePrinter {

    public function print(): void {

        $text = "Articles:\n";
        foreach( $this->articles as $shopArticle ) {
            $text .= $shopArticle->getInfo()."\n";
        }

        echo $text;
    }
}
?>