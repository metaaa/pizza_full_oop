<?php

class Menu
{
    /*public static function countRows(){
        $countQuery = "SELECT COUNT(mId) FROM menus";
        $countResult = Dbconfig::getInstance()->getConnection()->query($countQuery)->fetch_array();
        //print_r($countResult);
        return (100 / $countResult[0]);
    }*/
    /**
     * gets the menu items from the database
     */
    public static function getMenus()
    {
        $menuQuery = "SELECT * FROM menus";
        $menuQueryResult = Dbconfig::getInstance()->getConnection()->query($menuQuery);
        while ($row = $menuQueryResult->fetch_assoc()){
            echo '<li class="nav-item"><a class="nav-link" href="index.php?page=' . $row['mLink'] . '">' . $row['mName'] . '</a></li>';
        }
    }
}