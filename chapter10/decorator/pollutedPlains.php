<?php
class PollutedPlains extends Plains {

    public function getWealthFactor(): int {

        return parent::getWealthFactor() - 4;
    }
}
?>