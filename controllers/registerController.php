<?php
session_start();

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
        $registerForm = new RegisterForm();
        $registerForm->username = $_POST['username'];
        $registerForm->password = $_POST['password'];
        $registerForm->email = $_POST['email'];

        if ($registerForm->register()) {
            $_SESSION["logged_in"] = true;
            $_SESSION["username"] = $registerForm->username;
            $_SESSION["password"] = $registerForm->password;
        }

        header("Location: /pizza_full_oop/index.php?page=register");
        exit();
    }
}