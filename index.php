<?php
//start session
session_start();

spl_autoload_register(function ($className) {
    include "models/$className.php";
});

$db = Dbconfig::getInstance()->getConnection();


?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="css/default.css">
<link href="favicon.ico" rel="icon" type="image/x-icon" />
<html>
<head>
    <title>order pizza by metaaa</title>
</head>
<body>
    <div class="grid-container">
        <div class="header"></div>
    <div class="menu">
        <ul>
            <?= Menu::getAll(); ?>
        </ul>
    </div>
    <?php
        if (Flash::getSuccess()) { ?>
            <div class="flash">
                <?= Flash::getSuccess() ?>
            </div>
    <?php
        }
        if (Flash::getError()) { ?>
        <div class="flash">
            <?= Flash::getError() ?>
        </div>
    <?php
        }
        Flash::flush()
    ?>

    <div class="body-container">
        <div class="content">
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
        <div class="actions"></div>
    </div>
    <div class="footer"></div>
    </div>
</body>
</html>
