<?php



?>
<div class="card">
    <article class="card-body">
        <a href="#" id="signup" class="float-right btn btn-outline-primary">Sign up</a>
        <h4 class="card-title mb-4 mt-1">Sign in</h4>
        <hr>
        <?php
        if (Flash::getSuccess()) { ?>
            <p class="text-success text-center">
                <?= Flash::getSuccess() ?>
            </p>
            <?php
        }
        if (Flash::getError()) { ?>
            <p class="text-danger text-center">
                <?= Flash::getError() ?>
            </p>
            <?php
        }
        Flash::flush()
        ?>
        <form action="/pizza_full_oop/controllers/loginController.php" class="login-form" method="POST">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div> <!-- input-group-prepend -->
                    <input name="username" type="input" class="form-control" placeholder="Email or login">
                </div> <!-- input-group -->
            </div> <!-- form-group -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div> <!-- input-group-prepend -->
                    <input class="form-control" name="password" type="password" placeholder="******">
                </div> <!-- input-group -->
            </div> <!-- form-group -->
            <div class="checkbox">
                <label> <input type="checkbox" name="remember_me"> Save password </label>
            </div> <!-- remember me option -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div> <!-- submit button -->
        </form>
    </article>
</div> <!-- card -->
<script type="text/javascript">
    $(".card a").click(function() {
        $("a").load("register.php");
    });
    $(".card a").load("register.php");
</script>

https://bootsnipp.com/snippets/j6r4X