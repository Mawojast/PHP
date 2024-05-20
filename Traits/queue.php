<?php
trait Queue{

    private array $items = [];
    private int $tail = 0;
    private int $head = 0;

    public function enqueue(mixed $item): void{

        $this->items[$this->tail] = $item;
        $this->tail++;
    }

    public function dequeue(): mixed{
        
        if(empty($this->items)) return null;

        $item = $this->items[$this->head];
        unset($this->items[$this->head]);
        $this->head++;

        return $item;
    }

    public function length(): int{

        return $this->tail - $this->head;
    }
}