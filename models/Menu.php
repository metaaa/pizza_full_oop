<?php

class Menu extends Dbconfig
{
    public static function getAll()
    {
                $menuQuery = "SELECT * FROM menu";
        $menuQueryResult = Dbconfig::getInstance()->getConnection()->query($menuQuery);
        while ($row = $menuQueryResult->fetch_assoc()){
            echo '<li style="width: 100px"><a href="index.php?page=' . $row['mLink'] . '">' . $row['mName'] . '</a>';
        }
    }
}