<?php
class Totalizer2 {

    public static function warnAmount($amt): callable {

        $count = 0;
        return function ($article) use ($amt, &$count) {
            $count += $article->price;
            echo " count: {$count}\n";
            if( $count > $amt ) {
                echo "High price: {$count}\n";
            }
        };
    }
}
?>