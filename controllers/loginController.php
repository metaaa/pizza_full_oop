<?php
session_start();

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
    if (isset($_POST['uName']) && isset($_POST['uPassword'])) {
        $loginForm = new LoginForm();
        $loginForm->uName = $_POST['uName'];
        $loginForm->uPassword = $_POST['uPassword'];

        if ($loginForm->login()) {
            Flash::success("You have logged in!");
        }
        header("Location: /pizza_full_oop/index.php?page=home");
        exit();
    }
}