<?php

$menuItems = [
    [
        'menuText' => 'home',
        'order'    => '1',
        'menuTitle' => 'Welcome!'
    ],
    [
        'menuText' => 'pizza',
        'order'    => '2',
        'menuTitle' => 'Our Pizzas'
    ],
    [
        'menuText' => 'information',
        'order'    => '3',
        'menuTitle' => 'Information'
    ],
    [
        'menuText' => 'contact',
        'order'    => '4',
        'menuTitle' => 'Contact Us'
    ],
];

function menuBasic($menuItems){
    //count of menu items
    $cell_width = (100 / count($menuItems));
    //set different class to active menuitem
    $page = $_GET['page'];
    foreach ($menuItems as $item) {
        echo '<li ';

        if ($page == $item['menuText']) {
            echo 'class="selectedMenuItem" ';
        }

        echo 'style="width: ' . $cell_width . '%"><a href="index.php?page=' . $item['menuText'] . '">' . $item['menuText'] . '</a>';
    }
}
function menuOnAdmin($menuItems){
    $cell_width = (100 / count($menuItems));
    foreach ($menuItems as $item) {
        echo '<li style="width: ' . $cell_width . '%"><a href="../index.php?page=' . $item['menuText'] . '">' . $item['menuText'] . '</a>';

    }
}
//obtain the actual link
$actual_link = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//and check whether we are on admin site or not
if (strpos($actual_link, 'admin')){
    menuOnAdmin($menuItems);
} else {
    menuBasic($menuItems);
}
