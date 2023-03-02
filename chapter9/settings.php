<?php
class Settings {

    private array $properties = [];
    private static Settings $instance;

    private function __construct() {}

    public static function getInstance(): Settings {

        if(empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function setProperty(string $key, string $val): void {

        $this->properties[$key] = $val;
    }

    public function getProperty(string $key): string {

        return $this->properties[$key];
    }
}
?>