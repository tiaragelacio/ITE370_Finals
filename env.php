<?php

class Env {

    public static function load($path) {

        if (!file_exists($path)) return;

        $lines = file($path, FILE_IGNORE_NEW_LINES);

        foreach ($lines as $line) {

            if (trim($line) === '' || strpos($line, '#') === 0) continue;

            list($key, $value) = explode('=', $line);
            $_ENV[$key] = trim($value);
        }
    }

}
