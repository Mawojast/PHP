<?php
class ConfReader {

    public function getValues(array $default = []) {

        $values = [];
        $values = array_merge($default, $values);
        return $values;
    }
}
?>