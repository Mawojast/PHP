<?php
class Config {

    private \SimpleXMLElement $xml;
    private \SimpleXMLElement $lastmatch;

    public function __construct( private string $file ) {

        if ( !file_exists($file) ) {
            throw new FileException("file: '{$file}' does not exist");
        }

        $this->xml = simplexml_load_file($file);
        if ( !is_object($this->xml) ) {
            throw new XmlException(libxml_get_last_error());
        }

        $matches = $this->xml->xpath("/config");
        if ( !count($matches)) {
            throw new ConfigException("root element not found: config");
        }
    }

    public function write(): void {

        if ( !is_writeable(($this->file)) ) {
            throw new FileException("file: '{$this->file}' is not writeable");
        }

        echo "{$this->file} is writeable\n";
        file_put_contents($this->file, $this->xml->asXML());
    }

    public function get( string $str ): ?string {

        $matches = $this->xml->xpath("/config/item[@name=\"$str\"]");
        if ( count($matches) ) {
            $this->lastmatch = $matches[0];
            return (string) $matches[0];
        }

        return null;
    }

    public function set( string $key, string $value ): void {

        if ( !is_null($this->get($key))) {
            $this->lastmatch[0] = $value;
            return;
        }

        $config = $this->xml->conf;
        $this->xml->addChild('item', $value)->addAttribute('name', $key);
    }
}
?>