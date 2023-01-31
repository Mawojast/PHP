<?php
declare(strict_types=1);
class Storage {

    public function add(string $key, ?string $value) {
        if ( !is_bool($value) && !is_string($value) ) {
            error_log("Typ: ".gettype($value)." - Only Typ string or bool allowed");
            return false;
        }
    }

    public function setShopArticle1(ShopArticle|null $article) {}

    public function setShopArticle2(ShopArticle|false $article) {}

    
}
?>