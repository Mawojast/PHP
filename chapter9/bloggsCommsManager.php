<?php
class BloggsCommsManager extends CommsManager {

    public function getHeader(): string {
        return "BloggsHeader\n";
    }

    public function getApptEncoder(): ApptEncoder {

        return new BloggsApptEncoder();
    }

    public function getFooter(): string {

        return "BloggsFooter\n";
    }
}
?>