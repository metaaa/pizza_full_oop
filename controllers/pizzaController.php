<?php

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});


$pizzas[] = BaseRecord::getAll("pizzas");

foreach ($pizzas as $key => $item) {

}

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {

}