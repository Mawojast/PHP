<?php
namespace articles;
class Article {

    public function getClass() {

        $article = self::getArticle();
        if($article instanceof Article) {
            echo "This class is a Article object\n";
        }
    }

    public static function getArticle() {
        return new self();
    }
}
?>