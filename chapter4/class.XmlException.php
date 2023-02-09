<?php
class XmlException extends Exception {

    public function __construct( private LibXmlError $error ) {

        $file = basename($error->file);
        $message = "[file: {$file}, line: [$error->line], column: {$error->column} - {$error->message}]";
        $this->error = $error;
        parent::__construct($message, $error->code);
    }

    public function getLibXmlError(): LibXmlError {

        return $this->error;
    }
}
?>