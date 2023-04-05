<?php
abstract class ProcessRequest {

    abstract public function process(RequestHelper $request): void;
}
?>