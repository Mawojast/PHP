<?php
class Totalizer3 {

    private float $count = 0;
    private float $amt = 0;

    public function warnAmount(int $amt): callable {

        $this->amt = $amt;
        return Closure::fromCallable([$this, "processPrice"]);
    }
    private function processPrice( Article $article ): void {

        $this->count += $article->price;
        echo " count: {$this->count}\n";
        if ($this->count > $this->amt) {
            echo "High price: {$this->count}\n";
        }
    }
}