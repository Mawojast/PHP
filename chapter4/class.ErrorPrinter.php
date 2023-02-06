<?php
require_once(__DIR__."/abstract.ShopArticlePrinter.php");
class ErrorPrinter extends ShopArticlePrinter {

    public function print(): void {
        echo "print error";
    }
}
?>