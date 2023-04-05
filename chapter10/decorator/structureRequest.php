<?php
class StructureRequest extends DecoratorProcess {

    public function process(RequestHelper $request): void {

        echo __CLASS__." : structure request\n";
        $this->processRequest->process($request);
    }
}
?>