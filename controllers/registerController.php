<?php
session_start();

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {
    if (isset($_POST['uName']) && isset($_POST['uPassword']) && isset($_POST['uEmail'])) {
        $registerForm = new RegisterForm();
        $registerForm->uName = $_POST['uName'];
        $registerForm->uPassword = $_POST['uPassword'];
        $registerForm->uEmail = $_POST['uEmail'];

        if ($registerForm->register()) {
            $user = User::findByName($registerForm->uName);
            $user->login();
        }

        header("Location: /pizza_full_oop/index.php?page=register");
        exit();
    }
}