<?php

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {


}