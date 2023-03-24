<?php
class AppointmentMaker {

    public function __construct(private ApptEncoder $encoder){}

    public function makeAppointment(): string{

        return $this->encoder->encode();
    }
}
?>