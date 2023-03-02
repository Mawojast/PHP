<?php
abstract class CommsManager {

    abstract public function getFooter(): string;

    abstract public function getApptEncoder(): ApptEncoder;

    abstract public function getHeader(): string;
}
?>