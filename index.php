<?php
//start session
session_start();

spl_autoload_register(function ($className) {
    include "models/$className.php";
});

?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/default.css">
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<html>
<head>
    <title>order pizza by metaaa</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center" id="header-container">
        <div class="col-12" id="header"></div>
    </div>
    <!-- menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
        <a class="navbar-brand" href="#">PizzaSite</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= Menu::getMenus(); ?>
                </li>
            </ul>
        </div>
    </nav>
    <div class="row justify-content-center" id="flash-container">
        <?php
        if (Flash::getSuccess()) { ?>
            <div class="alert alert-success" role="alert" style="width: 100%">
                <?= Flash::getSuccess() ?>
            </div>
            <?php
        }
        if (Flash::getError()) { ?>
            <div class="alert alert-danger" role="alert" style="width: 100%">
                <?= Flash::getError() ?>
            </div>
            <?php
        }
        Flash::flush()
        ?>
    </div>
    <div class="row">
        <div class="col-9">
            <?php
            //set the content for the pages
            $pagesDir = 'content-files';
            if (!empty($_GET['page'])) {
                try {
                    $pages = scandir($pagesDir,0);
                    unset($pages[0], $pages[1]);
                    $page =  $_GET['page'];
                    if (!in_array($page . '.php', $pages)){
                        throw new Exception("Page not found...");
                    }
                    include ($pagesDir . '/' . $page . '.php');
                } catch (Exception $exception) {
                    echo $exception->getMessage();
                }
            } else{
                include ($pagesDir . '/home.php');
            }
            ?>
        </div>
        <div class="col-3">
            <?php
                include "forms/login.php";
                include "forms/register.php";
            ?>
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small" style="background: #343a40">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3" style="color: white">© 2018 Copyright: metaaa
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script  src="js/login_form.js"></script>
</body>
</html>
