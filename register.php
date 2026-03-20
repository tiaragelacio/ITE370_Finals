<?php
require_once '../app/Controllers/AuthController.php';

$auth = new AuthController();

if ($_POST) {
    echo $auth->register($_POST);
}
?>

<form method="POST">
    <input name="username">
    <input name="password" type="password">
    <button>Register</button>
</form>
