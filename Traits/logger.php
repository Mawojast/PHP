<?php
trait Logger{

    public string $message = '';
    public function setMessage(string $message): void{

        $this->message = $message;
    }
    public function getMessage(): string{

        return $this->message;
    }

    public abstract function log(string $message): mixed;
}