<?php
class ProcessSale {

    private array $callbacks;

    public function registerCallback( callable $callback ): void {

        $this->callbacks[] = $callback;
    }

    public function sale( Article $article ): void {

        echo "{$article->name}: processing \n";
        foreach( $this->callbacks as $callback ) {
            call_user_func( $callback, $article );
        }
    }
}
?>