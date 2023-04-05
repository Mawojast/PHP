<?php
class LogRequest extends DecoratorProcess {

    public function process(RequestHelper $request): void {

        print __CLASS__."Log request\n";
        $this->processRequest->process($request);
    }
}
?>