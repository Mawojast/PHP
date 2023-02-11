<?php
class Mailer {

    public function doMail( Article $article ){

        echo "Mail: {$article->name} - {$article->price}";
    }
}
?>