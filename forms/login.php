<div class="card">
    <divider>
    <article class="card-body" id="card-body-login">
        <a href="#" class="float-right btn btn-outline-primary">Sign up</a>
        <h4 class="card-title mb-4 mt-1">Sign in</h4>
        <hr>
        <form action="/pizza_full_oop/controllers/loginController.php" class="login-form" method="POST">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div> <!-- input-group-prepend -->
                    <input name="uName" type="input" class="form-control" placeholder="Email or username">
                </div> <!-- input-group -->
            </div> <!-- form-group -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div> <!-- input-group-prepend -->
                    <input class="form-control" name="uPassword" type="password" placeholder="******">
                </div> <!-- input-group -->
            </div> <!-- form-group -->
            <div class="checkbox">
                <label> <input type="checkbox" name="remember_me"> Save password </label>
            </div> <!-- remember me option -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div> <!-- submit button -->
        </form>
    </article>
</divider>
</div> <!-- card -->


