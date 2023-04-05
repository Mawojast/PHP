<?php
class MainProcess extends ProcessRequest {

    public function process(RequestHelper $request): void {

        print __CLASS__.": request activate\n";
    }
}
?>