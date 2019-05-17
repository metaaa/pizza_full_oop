<?php

class Menu extends Dbconfig
{
    public function getAll()
    {
        $menuItems = array();
        $menuQuery = "SELECT * FROM menu";
        $menuQueryResult = Dbconfig::getInstance()->getConnection()->query($menuQuery);
        while ($row = $menuQueryResult->fetch_assoc()){
            echo "<li";
        }
    }
}