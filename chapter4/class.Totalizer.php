<?php
class Totalizer {

    public static function warnAmount(): callable {

        return function( Article $article ) {
            if ( $article->price > 10 ) {
                echo "Price over 10: {$article->price}\n";
            }
        };
    }
}
?>