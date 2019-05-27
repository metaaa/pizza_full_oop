<?php


$user = new User();
$user->login();

?>

<form action="/pizza_full_oop/controllers/loginController.php" class="register-form" method="POST">
    <input name="username" type="input">
    <input name="password" type="password">
    <button type="submit">Submit</button>
</form>
