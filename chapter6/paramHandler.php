<?php
abstract class ParamHandler {

    protected array $params = [];

    public function __construct( protected string $source ) {}

    public function addParam(string $key, string $val):void {

        $this->params[$key] = $val;
    }

    public function getAllParams(): array {

        return $this->params;
    }

    public static function getInstance(string $filename): ParamHandler {
        return new static ($filename);
        /*if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }
        return new TextParamHandler($filename);*/
    }

    abstract public function write(): void;
    abstract public function read(): void;
}
?>