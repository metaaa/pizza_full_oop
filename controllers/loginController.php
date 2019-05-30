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
        $loginForm->rememberMe = $_POST['remember_me'];

        if ($loginForm->login()) {
            $_SESSION["logged_in"] = true;
            $_SESSION["uId"] = $loginForm->id;
            $_SESSION["username"] = $loginForm->username;
            Flash::success("You have logged in!");
//            if ($loginForm->checkAdmin()){
//                $_SESSION["is_admin"] = $loginForm->isAdmin;
//            }

        }
        header("Location: /pizza_full_oop/index.php?page=home");
        exit();
    }
}