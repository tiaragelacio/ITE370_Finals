<?php
require_once 'Env.php';

Env::load(__DIR__ . '/../../.env');

class Database {

    private static $instance = null;

    public static function connect() {

        if (self::$instance === null) {

            try {
                self::$instance = new PDO(
                    "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS']
                );

                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                die("DB Error");
            }
        }

        return self::$instance;
    }
}
