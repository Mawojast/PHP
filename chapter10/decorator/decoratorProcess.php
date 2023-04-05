<?php
abstract class DecoratorProcess extends ProcessRequest {

    public function __construct(protected ProcessRequest $processRequest) {}
}
?>