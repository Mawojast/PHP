<?php
class AppointmentMaker {

    private ApptEncoder $encoder;

    public function setApptEncoder(ApptEncoder $encoder){

        $this->encoder = $encoder;
    }
    public function makeAppointment(): string {

        $encoder = new BloggsApptEncoder();
        return $encoder->encode();
    }
}
?>