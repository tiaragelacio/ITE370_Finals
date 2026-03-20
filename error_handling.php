<?php

class ErrorHandler {

    public static function handle($e) {

        if ($_ENV['APP_DEBUG'] === 'true') {
            return $e->getMessage();
        }

        return "Something went wrong.";
    }
}
