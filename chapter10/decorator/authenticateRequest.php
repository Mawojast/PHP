<?php
class AuthenticateRequest extends DecoratorProcess {

    public function process(RequestHelper $request): void {

        echo __CLASS__.": authenticate request\n";
        $this->processRequest->process($request);
    }
}
?>
