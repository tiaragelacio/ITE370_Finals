<?php
require_once '../app/Controllers/AuthController.php';

$auth = new AuthController();

if ($_POST) {
    $result = $auth->login($_POST);

    if ($result === true) {
        echo "Login Success";
    } else {
        echo $result;
    }
}
?>

<form method="POST">
    <input name="username">
    <input name="password" type="password">
    <button>Login</button>
</form>
