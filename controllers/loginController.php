<?php
session_start();

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $loginForm = new LoginForm();
        $loginForm->username = $_POST['username'];
        $loginForm->password = $_POST['password'];

        if ($loginForm->login()) {
            $_SESSION["username"] = $loginForm->username;
            $_SESSION["password"] = $loginForm->password;
        }

        header("Location: /pizza_oop/index.php?page=login");
        exit();
    }
}