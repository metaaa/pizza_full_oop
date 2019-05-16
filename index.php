<?php
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
<body class="divBody">
<div id="siteArea" class="divSiteArea">
    <div id="header" class="divHeader"></div>
    <div id="mainMenu" class="divMainMenu">
        <ul class="mainMenuList" id="mainMenuList">
            <?php
            include 'content-files/menu.php';
            ?>
        </ul>
    </div>
    <?php
        if (Flash::getSuccess()) { ?>
            <div id="mainMenu" class="flash-success">
                <?= Flash::getSuccess() ?>
            </div>
    <?php
        }
        if (Flash::getError()) { ?>
        <div id="mainMenu" class="flash-error">
            <?= Flash::getError() ?>
        </div>
    <?php
        }
        Flash::flush()
    ?>

    <div class="divDivider" ></div>
    <div id="content" class="divContent">
        <div id="leftColumn" class="divLeftColumn">
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
        <div id="footer" class="divFooter">
            <div id="footerLeft" class="divFooterLeft"></div>
            <div id="footerRight" class="divFooterRight"></div>
        </div>
    </div>
</body>
</html>
