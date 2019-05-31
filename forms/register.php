<div class="card">
    <divider>
    <article class="card-body" id="card-body-register">
        <a href="#" class="float-right btn btn-outline-primary">Login</a>
        <h4 class="card-title mb-4 mt-1">Sign up</h4>
        <hr>
        <form action="/pizza_full_oop/controllers/registerController.php" class="register-form" method="POST">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div> <!-- input-group-prepend -->
                    <input name="username" type="input" class="form-control" placeholder="Username">
                </div> <!-- input-group -->
            </div> <!-- form-group -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div> <!-- input-group-prepend -->
                    <input class="form-control" name="email" type="email" placeholder="Email address">
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
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div> <!-- submit button -->
        </form>
    </article>
    </divider>
</div> <!-- card -->
