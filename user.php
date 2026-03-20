<?php
require_once __DIR__ . 'Database.php';

class User {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($username, $password) {

        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public function find($username) {

        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");

        $stmt->execute([':username' => $username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
