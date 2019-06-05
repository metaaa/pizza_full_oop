<?php

spl_autoload_register(function ($className) {
    include "../models/$className.php";
});

$pizzas = BaseRecord::getAll("pizzas");
foreach ($pizzas as $key) {
    echo "<tr>";
    echo
        "<td>" . $key->pId . "</td>
         <td>" . $key->pName . "</td>
         <td>" . $key->pDescription . "</td>
         <td>" . $key->pPrice . "</td>
         <td>" . $key->pImage . "</td>";
    echo "</tr>";
}


if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)) {

}