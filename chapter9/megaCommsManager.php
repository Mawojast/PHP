<?php
class MegaCommsManager extends CommsManager {

    public function getHeaderText(): string {
        return "MegasHeader\n";
    }

    public function make(int $flag_int): Encoder {

        switch ($flag_int) {
            case self::APPT:
                return new MegasApptEncoder();
            case self::CONTACT:
                return new MegasContactEncoder();
            case self::TTD:
                return new MegasTtdEncoder();
            default:
                return new MegasApptEncoder();
        }
    }

    public function getFooterText(): string {

        return "BloggsFooter\n";
    }
}