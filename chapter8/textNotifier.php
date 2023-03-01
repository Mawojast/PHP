<?php
class TextNotifier extends Notifier {

    public function inform($message): void {

        echo "TEXT notification: {$message}\n";
    }
}
?>