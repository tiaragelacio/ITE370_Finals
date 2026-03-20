<?php

class Validator {

    public static function clean($data) {
        return htmlspecialchars(trim($data));
    }

    public static function required($data, $field) {
        if (empty($data)) {
            throw new Exception("$field is required");
        }
    }

    public static function min($data, $length, $field) {
        if (strlen($data) < $length) {
            throw new Exception("$field must be at least $length chars");
        }
    }
}
