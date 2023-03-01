<?php
class MailNotifier extends Notifier {

    public function inform($message): void {

        echo "MAIL notification: {$message}\n";
    }
}
?>