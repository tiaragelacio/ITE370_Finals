<?php
require_once __DIR__ . 'user.php';
require_once __DIR__ . 'input_validation.php';
require_once __DIR__ . 'error_handling.php';

session_start();

class AuthController {

    private $user;

    public function __construct() {
        $this->user = new User();
    }

    public function register($data) {

        try {

            Validator::required($data['username'], "Username");
            Validator::min($data['username'], 3, "Username");

            Validator::required($data['password'], "Password");
            Validator::min($data['password'], 5, "Password");

            $username = Validator::clean($data['username']);
            $password = Validator::clean($data['password']);

            $this->user->create($username, $password);

            return "Registered Successfully";

        } catch (Exception $e) {
            return ErrorHandler::handle($e);
        }
    }

    public function login($data) {

        try {

            Validator::required($data['username'], "Username");
            Validator::required($data['password'], "Password");

            $user = $this->user->find($data['username']);

            if ($user && password_verify($data['password'], $user['password'])) {

                $_SESSION['user'] = $user['id'];
                return true;
            }

            return "Invalid login";

        } catch (Exception $e) {
            return ErrorHandler::handle($e);
        }
    }
}
